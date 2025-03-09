<?php

namespace App\Http\Controllers;

use App\Models\Simulation;
use App\Models\UserSimulation;
use App\Models\UserQuestionResponse;
use App\Models\Question;
use App\Models\Redaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserSimulationController extends Controller
{
    public function inProgress($simulationId, $userSimulationId)
    {

        $simulation = Simulation::find($simulationId);
        $userSimulation = UserSimulation::find($userSimulationId);
        

        $questions = Question::where('simulation_id', $simulationId)->get();
        
        foreach ($questions as $question) {
            $question->userQuestionResponse = UserQuestionResponse::where('question_id', $question->id)
                ->where('user_id', auth()->id())
                ->where('user_simulation_id', $userSimulationId)
                ->first();
        }

        return view('userSimulation.in-progress', compact('simulation', 'userSimulation', 'questions'));
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

    $question = Question::findOrFail($questionId);

    $userQuestionResponse = UserQuestionResponse::updateOrCreate(
        [
            'user_simulation_id' => $simulationId,
            'question_id' => $questionId,
            'user_id' => auth()->id(),
        ],
        [
            'response' => $request->response,
            'acert' => ($request->response == $question->correct_alternative) ? true : false,
        ]
        
    );

    return response()->json(['message' => 'Resposta salva com sucesso!', 'data' => $userQuestionResponse]);
}

public function finish($userSimulationId)
{
    $userSimulation = UserSimulation::findOrFail($userSimulationId);
    
    if(empty($userSimulation->finished)){
        $userSimulation->finished = Carbon::now()->format('Y-m-d H:i:s');
        $userSimulation->save();
    }

    $redaction = Redaction::where('user_simulation_id', $userSimulation->id)->first();

    return redirect()->route('redaction.in-progress', [
        'redactionId' => $redaction->id,
    ]);}


    public function view($userSimulationId, $redactionId){
        $userSimulation = UserSimulation::findOrFail($userSimulationId);
        $redaction = Redaction::findOrFail($redactionId);
        
        return view('userSimulation.view', compact('userSimulation', 'redaction'));
    }

}