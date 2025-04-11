<?php

namespace App\View\Components\Sidebars;

use Illuminate\View\Component;

class AdministrativeSidebar extends Component
{

    public function __construct()
    {
    }

    public function render()
    {
        return view('components.sidebars.administrative-sidebar');
    }
}
