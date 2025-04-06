<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Add extends Component
{
  
    public $text;
    public $route;

    public function __construct($text = 'Adicionar', $route = '')
    {
        $this->text = $text;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.buttons.add');
    }
}
