<?php

namespace App\Http\Controllers;

use App\Models\Simulation;
use App\Models\Redaction;
use App\Models\Question;
use App\Models\UserSimulation;
use App\Models\UserQuestionResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    public function index(Request $request)
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

        $simulations = $query->paginate(3); // 10 é o número de itens por página, ajuste conforme necessário

        return view('simulation.index', compact('simulations'));
    }

    public function start($id)
    {
        $simulation = Simulation::with('questions')->find($id);

        if (!$simulation) {
            return redirect()->route('simulations.index')->with('error', 'Simulação não encontrada.');
        }

        $userSimulationData = [
            'user_id' => Auth::id(),
            'simulation_id' => $simulation->id,
        ];

        $userSimulation = UserSimulation::create($userSimulationData);
        $redactionData = [
            'user_id' => Auth::id(),
            'simulation_id' => $simulation->id,
            'user_simulation_id' => $userSimulation->id,
            'theme' => $simulation->redaction_theme,
            'introduction' => $simulation->redaction_introduction,
            'type' => $simulation->type,
        ];

        $redaction = Redaction::create($redactionData);

        $userSimulation->redaction_id = $redaction->id;
        $userSimulation->save();

        foreach ($simulation->questions as $question) {
            UserQuestionResponse::create([
                'user_id' => Auth::id(),
                'user_simulation_id' => $userSimulation->id,
                'question_id' => $question->id,
                'status' => 'não respondido', // Exemplo, altere conforme necessário
            ]);
        }   
        return redirect()->route('userSimulation.in-progress', [
            'simulationId' => $simulation->id,
            'userSimulationId' => $userSimulation->id,
        ]);
    }    
}
