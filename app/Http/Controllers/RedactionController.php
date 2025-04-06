<?php

namespace App\Http\Controllers;

use App\Models\Redaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RedactionController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();

        $redactions = Redaction::where('user_id', $userId)
            ->with('simulation')  // Carrega a relação `simulation`
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('redaction.index', compact('redactions'));
    }

    public function view($id)
    {
        $redaction = Redaction::find($id);

        return view('redaction.view', compact('redaction'));
    }

    public function inProgress($redactionId)
    {
        $redaction = Redaction::findOrFail($redactionId);

        return view('redaction.in-progress', compact('redaction'));
    }

    public function finish(Request $request, $redactionId)
    {
        $redaction = Redaction::findOrFail($redactionId);

        if ($request->has('text')) {
            $redaction->text = $request->input('text');

            if (empty($redaction->corrected)) {
                $redaction->corrected = Carbon::now()->format('Y-m-d H:i:s');
            }

            $redaction->correction = $this->getCorrectRedaction($redaction->text, $redaction->theme);
            $redaction->score = $this->getScoreRedaction($redaction->text, $redaction->theme);

            $redaction->save();
        }

        return redirect()->route('userSimulation.view', [
            'id' => $redaction->user_simulation_id,
        ]);
    }

    public function getCorrectRedaction($redactionText, $redactioTheme)
    {

        $apiKey = 'AIzaSyCIYnVCPoo-lL2LfvhmeRDpaLAOE5blPgk';
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => 'Você é um avaliador de provas, Não fale mais nada que não seja correção ou sujestão, seja direto, agora lista e corrija os erros de uma redação do tema: ' . $redactioTheme . 'seguindo o modelo de prova de vestibular, sem reescrever o texto inteiro, este é a redação a ser corrigida: ' . $redactionText
                        ]
                    ]
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post($url, $payload);

            if ($response->successful()) {
                return $response->json()['candidates'][0]['content']['parts'][0]['text'];
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'API Request failed',
                    'details' => $response->json()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getScoreRedaction($redactionText, $redactioTheme)
    {

        $apiKey = 'AIzaSyCIYnVCPoo-lL2LfvhmeRDpaLAOE5blPgk';
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => 'Me da uma nota de 0 a 1000 seguindo os critérios do enem, me responda somente a nota, sem mais nenhum texto, sendo a redação do tema: ' . $redactioTheme . ' Esse é o texto ' . $redactionText
                        ]
                    ]
                ]
            ]
        ];

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post($url, $payload);

            if ($response->successful()) {
                return $response->json()['candidates'][0]['content']['parts'][0]['text'];
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'API Request failed',
                    'details' => $response->json()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
