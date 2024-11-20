<?php

namespace App\Http\Controllers;

use App\Models\Simulation;
use App\Models\Question;
use App\Models\UserSimulation;
use App\Models\UserQuestionResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    public function simulationsDashboard(Request $request)
    {
        $query = Simulation::query();

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('type')) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', 'like', '%' . $request->status . '%');
        }

        $simulations = $query->get();

        return view('simulations-dashboard', compact('simulations'));
    }

    public function simulationsStart($id)
    {
        $simulation = Simulation::with('questions')->find($id);

        if (!$simulation) {
            return redirect()->route('simulations.index')->with('error', 'Simulação não encontrada.');
        }

        $userSimulationData = [
            'user_id' => Auth::id(),
            'simulation_id' => $simulation->id,
            'status' => 'iniciado',  // Exemplo, altere conforme necessário
        ];

        $userSimulation = UserSimulation::create($userSimulationData);

        foreach ($simulation->questions as $question) {
            UserQuestionResponse::create([
                'user_id' => Auth::id(),
                'user_simulation_id' => $userSimulation->id,
                'question_id' => $question->id,
                'status' => 'não respondido', // Exemplo, altere conforme necessário
            ]);
        }

        return redirect()->route('simulation-in-progress', [
            'simulation' => $simulation->id,
            'userSimulation' => $userSimulation->id,
        ]);
    }

    public function simulationInProgress(Simulation $simulation, UserSimulation $userSimulation)
    {
        $questions = Question::where('simulation_id', $simulation->id)->get();

        foreach ($questions as $question) {
            $question->userQuestionResponse = UserQuestionResponse::where('question_id', $question->id)
                ->where('user_id', auth()->id())
                ->where('user_simulation_id', $userSimulation->id)
                ->first();
        }

        return view('simulations.in-progress', compact('simulation', 'userSimulation', 'questions'));
    }

    public function getQuestion($simulationId, $questionNumber)
    {
        $simulation = Simulation::findOrFail($simulationId);
        $question = $simulation->questions()->where('number', $questionNumber)->first();

        if (!$question) {
            return response()->json(['error' => 'Questão não encontrada'], 404);
        }

        return response()->json([
            'question' => $question
        ]);
    }

    public function saveResponse(Request $request, $simulationId, $questionId)
    {   

        $request->validate([
        'response' => 'required|string|in:a,b,c,d,e',
    ]);

    $userQuestionResponse = UserQuestionResponse::updateOrCreate(
        [
            'user_simulation_id' => $simulationId,
            'question_id' => $questionId,
            'user_id' => auth()->id(),
        ],
        [
            'response' => $request->response,
            'acert' => false, // Você pode adicionar a lógica de correção posteriormente
        ]
    );

    return response()->json(['message' => 'Resposta salva com sucesso!', 'data' => $userQuestionResponse]);
}


    


    
}
