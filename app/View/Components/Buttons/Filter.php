<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class filter extends Component
{
  
    public $text;
    public $route;

    public function __construct($text = 'Filtrar', $route = '')
    {
        $this->text = $text;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.buttons.filter');
    }
}
