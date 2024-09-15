<?php 

namespace App\Http\Controllers;

class AdministrativeController extends Controller
{
    
    public function administrativeDashboard()
    {
        return view('administrative-dashboard');
    }

    
    public function administrativeDashboardSimulations()
    {
        return view('administrative-dashboard-simulations');
    }

    public function administrativeAddSimulations()
    {
        return view('administrative-add-simulations');
    }

    
    public function administrativeEditSimulations()
    {
        return view('administrative-edit-simulations');
    }

    
    public function administrativeDisabledSimulations()
    {
        return view('administrative-disabled-simulations');
    }
    
    public function administrativeDeleteSimulations()
    {
        return view('administrative-delete-simulations');
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
