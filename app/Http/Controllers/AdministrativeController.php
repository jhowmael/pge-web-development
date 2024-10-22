<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulation;

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

        $validatedData['name'] = config('simulations.types.' . $validatedData['type']). ' - ' .  $validatedData['year'];
        $validatedData['status'] = config('simulations.autoStatusRegister');

        // Cria o novo simulado e salva no banco de dados
        Simulation::create($validatedData);

        // Redireciona o usuário com uma mensagem de sucesso
        return redirect()->route('administrative-add-simulations')->with('success', 'Simulado adicionado com sucesso!');
    }
    
    public function administrativeViewSimulations($id)
    {

        $simulation = Simulation::where('id', $id)->first();
 
        return view('administrative-view-simulations', compact('simulation'));
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
    
        $validatedData['name'] = config('simulations.types.' . $validatedData['type']). ' - ' .  $validatedData['year'];

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

}
