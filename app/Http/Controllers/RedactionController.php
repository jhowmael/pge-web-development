<?php

namespace App\Http\Controllers;

use App\Models\Redaction;
use App\Models\UserSimulation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class RedactionController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();

        $redactions = Redaction::where('user_id', $userId)
            ->with('simulation')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('redaction.index', compact('redactions'));
    }

    public function view($id)
    {
        $redaction = Redaction::find($id);
        $this->authorize('view', $redaction);

        return view('redaction.view', compact('redaction'));
    }

    public function inProgress($redactionId)
    {
        $redaction = Redaction::findOrFail($redactionId);
        $this->authorize('inProgress', $redaction);

        return view('redaction.in-progress', compact('redaction'));
    }

    public function finish(Request $request, $redactionId)
    {
        $validated = $request->validate([
            'text' => 'required|string|min:100|max:5000',
            'title' => 'required|string|min:1|max:100',
        ]);

        $redaction = Redaction::findOrFail($redactionId);
        $this->authorize('finish', $redaction);

        /* 
        if ($currentCount >= $limit) {
            return response()->json([
                'success' => false,
                'message' => "Você atingiu o limite de 20 redações por dia. Tente novamente amanhã."
            ], 429); 
        }
        */
        $userSimulation = UserSimulation::where('user_id', auth()->id())
            ->where('redaction_id', $redaction->id)
            ->first();

        $user = User::where('id', auth()->id())->first();

        $cacheKey = 'user_redaction_limit_' . auth()->id();
        $currentCount = cache()->get($cacheKey, 0);
        $limit = 20;
        $expiry = now()->addDay();

        cache()->put($cacheKey, $currentCount + 1, $expiry);

        if ($request->has('title')) {
            $redaction->title = strip_tags($request->input('title'));
        }

        if ($request->has('text')) {
            $redaction->text = strip_tags($request->input('text'));

            if (empty($redaction->corrected)) {
                $redaction->corrected = Carbon::now()->format('Y-m-d H:i:s');
            }

            $analysis = $this->analyzeRedaction($redaction->text, $redaction->theme, $redaction->title);

            $redaction->correction = $analysis['correction'];
            $redaction->score = $analysis['score'];
            $redaction->clarity_score = $analysis['area_scores']['clareza_score'] ?? 0;
            $redaction->spelling_score = $analysis['area_scores']['ortografia_score'] ?? 0;
            $redaction->argumentation_score = $analysis['area_scores']['argumentacao_score'] ?? 0;
            $redaction->structure_score = $analysis['area_scores']['estrutura_score'] ?? 0;
            $redaction->cohesion_score = $analysis['area_scores']['coesao_score'] ?? 0;

            $redaction->save();
            $userSimulation->save();
            $user->save();
        }

        return redirect()->route('userSimulation.view', [
            'id' => $redaction->user_simulation_id,
        ]);
    }

    public function analyzeRedaction($text, $theme, $title)
    {
        $apiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

        $prompt = "Corrija a seguinte redação com base em uma avaliação de vestibular.
        1. Liste os erros e sugestões (sem reescrever o texto inteiro).
        2. Dê uma nota geral de 0 a 1000 (somente o número).
        3. Dê notas de 0 a 1000 para: ortografia, clareza, argumentação, estrutura, coesão.

        Siga este formato:

        ## Correção:
        [correção aqui]

        ## Nota Geral:
        [nota geral aqui]

        ## Notas por Área:
        ortografia - 100
        clareza - 200
        argumentação - 300
        estrutura - 400
        coesão - 100

        Tema: $theme
        Título: $title
        Texto: $text";

        $payload = [
            'contents' => [[
                'parts' => [['text' => $prompt]]
            ]]
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post($url, $payload);

            if ($response->successful()) {
                $result = $response->json()['candidates'][0]['content']['parts'][0]['text'];
                return $this->parseAnalysis($result);
            } else {
                return [
                    'correction' => 'Erro ao gerar correção.',
                    'score' => 0,
                    'area_scores' => []
                ];
            }
        } catch (\Exception $e) {
            return [
                'correction' => 'Erro: ' . $e->getMessage(),
                'score' => 0,
                'area_scores' => []
            ];
        }
    }

    public function parseAnalysis($text)
    {
        $correction = '';
        $score = 0;
        $area_scores = [];

        // Pega a correção
        if (preg_match('/## Correção:(.*?)## Nota Geral:/s', $text, $matches)) {
            $correction = trim($matches[1]);
        }

        // Pega a nota geral
        if (preg_match('/## Nota Geral:\s*(\d+)/', $text, $matches)) {
            $score = (int) $matches[1];
        }

        // Pega as notas por área
        if (preg_match('/## Notas por Área:(.*)/s', $text, $matches)) {
            $area_scores = $this->parseScores($matches[1]);
        }

        return [
            'correction' => $correction,
            'score' => $score,
            'area_scores' => $area_scores,
        ];
    }

    public function parseScores($scoreText)
    {
        $scores = [];

        preg_match_all('/([a-zA-Zá-úÁ-Úç~]+(?: [a-zA-Zá-úÁ-Úç~]+)*):?\s*[-]?\s*(\d+)/', $scoreText, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $area = strtolower($match[1]);
            $area = str_replace(['ç', 'ã', 'õ', 'â', 'ê', 'ô', 'é', 'á', 'í', 'ú', 'ó', '~'], ['c', 'a', 'o', 'a', 'e', 'o', 'e', 'a', 'i', 'u', 'o', ''], $area);
            $area = str_replace(' ', '_', $area);

            $score = (int) $match[2];
            $scores[$area . '_score'] = $score;
        }

        return $scores;
    }
}
