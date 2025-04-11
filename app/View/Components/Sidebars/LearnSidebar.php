<?php

namespace App\View\Components\Sidebars;

use Illuminate\View\Component;

class LearnSidebar extends Component
{

    public function __construct()
    {
    }

    public function render()
    {
        return view('components.sidebars.learn-sidebar');
    }
}
