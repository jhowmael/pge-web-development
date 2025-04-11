<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Back extends Component
{
  
    public $text;
    public $route;

    public function __construct($text = 'Voltar', $route = '')
    {
        $this->text = $text;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.buttons.back');
    }
}
