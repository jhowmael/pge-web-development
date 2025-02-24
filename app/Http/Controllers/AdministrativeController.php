<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulation;
use App\Models\Question;

class AdministrativeController extends Controller
{

    public function administrativeDashboard()
    {
        return view('administrative-dashboard');
    }

    public function administrativeDashboardSimulations()
    {
        $simulations = Simulation::orderBy('updated_at', 'desc')->take(20)->get();

        return view('administrative-dashboard-simulations', compact('simulations'));
    }

    public function administrativeAddSimulations()
    {
        return view('administrative-add-simulations');
    }

    public function administrativeStoreSimulations(Request $request)
    {

        // Validação dos dados
        $validatedData = $request->validate([
            'type' => 'required|string',
            'year' => 'required|integer',
            'edition' => 'nullable|string',
            'minimum_minute' => 'required|integer',
            'total_duration' => 'required|integer',
            'quantity_questions' => 'required|integer',
            'redaction_theme' => 'required|string',
            'total_points' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $validatedData['name'] = config('simulations.types.' . $validatedData['type']) . ' - ' .  $validatedData['year'];
        $validatedData['status'] = config('simulations.autoStatusRegister');

        // Cria o novo simulado e salva no banco de dados
        $simulation = Simulation::create($validatedData);
        for($i = 1; $i <= $simulation->quantity_questions; $i++){
            $questionData = array(
                'simulation_id' => $simulation->id,
                'number' => $i,
                'status' => config('questions.autoStatusRegister')
            );

            Question::create($questionData);
        }

        // Redireciona o usuário com uma mensagem de sucesso
        return redirect()->route('administrative-add-simulations')->with('success', 'Simulado adicionado com sucesso!');
    }

    public function administrativeViewSimulations($id)
    {
        $simulation = Simulation::with('questions')->where('id', $id)->first();
        $questions = $simulation->questions()->paginate(10); // Aqui você especifica a quantidade de perguntas por página
        return view('administrative-view-simulations', compact('simulation', 'questions'));
    }

    public function administrativeEditSimulations($id)
    {
        // Busca o simulado pelo ID
        $simulation = Simulation::findOrFail($id);

        // Retorna a view com o simulado
        return view('administrative-edit-simulations', compact('simulation'));
    }

    public function administrativeUpdateSimulations(Request $request, $id)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'type' => 'required|string',
            'edition' => 'nullable|string',
            'year' => 'required|integer',
            'minimum_minute' => 'required|integer',
            'total_duration' => 'required|integer',
            'quantity_questions' => 'required|integer',
            'redaction_theme' => 'required|string',
            'total_points' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $validatedData['name'] = config('simulations.types.' . $validatedData['type']) . ' - ' .  $validatedData['year'];

        // Atualiza o simulado no banco de dados
        $simulation = Simulation::findOrFail($id);
        $simulation->update($validatedData);

        // Redireciona para a tela de simulados com mensagem de sucesso
        return redirect()->route('administrative-dashboard-simulations')->with('success', 'Simulado atualizado com sucesso!');
    }

    public function administrativeDisableSimulations($id)
    {
        $validatedData['status'] = 'disabled';

        $simulation = Simulation::findOrFail($id);

        $simulation->update($validatedData);

        return redirect()->route('administrative-dashboard-simulations')->with('success', 'Simulado desabilitado com sucesso!');
    }

    public function administrativeEnableSimulations($id)
    {
        $validatedData['status'] = 'enabled';

        $simulation = Simulation::findOrFail($id);

        $simulation->update($validatedData);

        return redirect()->route('administrative-dashboard-simulations')->with('success', 'Simulado habilitado com sucesso!');
    }

    public function administrativeDeleteSimulations()
    {
        return view('administrative-delete-simulations');
    }

    // Método para filtrar os simulados
    public function administrativeFilterSimulations(Request $request)
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

        // Adicione mais filtros conforme necessário

        $simulations = $query->get();
        return view('administrative-filter-simulations', compact('simulations'));
    }

    public function administrativeDashboardUsers()
    {
        return view('administrative-dashboard-users');
    }

    public function administrativeEditUsers()
    {
        return view('administrative-edit-users');
    }

    public function administrativeViewUsers()
    {
        return view('administrative-view-users');
    }

    public function administrativeDisableUsers()
    {
        return view('administrative-disable-users');
    }


    public function administrativeViewQuestions($id)
    {
        $question = Question::where('id', $id)->first();
        $simulation = Simulation::where('id', $question->simulation_id)->first();

        return view('administrative-view-questions', compact('question', 'simulation'));
    }

    public function administrativeEditQuestions($id)
    {
        $question = Question::findOrFail($id);
        $simulation = Simulation::where('id', $question->simulation_id)->first();

        return view('administrative-edit-questions', compact('question', 'simulation'));
    }
    
    public function administrativeUpdateQuestions(Request $request, $id)
    {
        $validatedData = $request->validate([
            'theme' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'enunciation' => 'required|string',
            'correct_alternative' => 'required|string',
            'alternative_a' => 'required|string',
            'alternative_b' => 'required|string',
            'alternative_c' => 'required|string',
            'alternative_d' => 'required|string',
            'alternative_e' => 'required|string',
            'alternative_a_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'alternative_b_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'alternative_c_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'alternative_d_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'alternative_e_image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'resolution' => 'required|string',
        ]);
    
        $question = Question::findOrFail($id);
    
        // Salvar a imagem, se existir
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('', 'public');
            $validatedData['image'] = $path;
        }

        if ($request->hasFile('alternative_a_image')) {
            $path = $request->file('alternative_a_image')->store('', 'public');
            $validatedData['alternative_a_image'] = $path;
        }

        if ($request->hasFile('alternative_b_image')) {
            $path = $request->file('alternative_b_image')->store('', 'public');
            $validatedData['alternative_b_image'] = $path;
        }

        if ($request->hasFile('alternative_c_image')) {
            $path = $request->file('alternative_c_image')->store('', 'public');
            $validatedData['alternative_c_image'] = $path;
        }

        if ($request->hasFile('alternative_d_image')) {
            $path = $request->file('alternative_d_image')->store('', 'public');
            $validatedData['alternative_d_image'] = $path;
        }

        if ($request->hasFile('alternative_e_image')) {
            $path = $request->file('alternative_d_image')->store('', 'public');
            $validatedData['alternative_e_image'] = $path;
        }

        $question->update($validatedData);
    
        return redirect()->route('administrative-view-simulations', [$question->simulation_id])->with('success', 'Questão atualizado com sucesso!');
    }
    
}
