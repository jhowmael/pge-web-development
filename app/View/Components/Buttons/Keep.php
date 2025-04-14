<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Keep extends Component
{
  
    public $route;
    public $parameters;
    public $text;

    public function __construct($route = '', $parameters = '', $text = '')
    {
        $this->route = $route;
        $this->parameters = $parameters;
        $this->text = $text;
    }

    public function render()
    {
        return view('components.buttons.keep');
    }
}
