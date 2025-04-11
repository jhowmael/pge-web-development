<?php

namespace App\View\Components\Sidebars;

use Illuminate\View\Component;

class UserSidebar extends Component
{

    public function __construct()
    {
    }
 
    public function render()
    {
        return view('components.sidebars.user-sidebar');
    }
}
