<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class filter extends Component
{
  
    public $entities;

    public function __construct($entities = '')
    {
        $this->entities = $entities;
    }

    public function render()
    {
        return view('components.buttons.pagination');
    }
}
