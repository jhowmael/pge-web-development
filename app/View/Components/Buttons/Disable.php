<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Disable extends Component
{
  
    public $route;
    public $id;
    public $text;

    public function __construct($route = '', $id = '', $text = 'Deletar')
    {
        $this->route = $route;
        $this->id = $id;
        $this->text = $text;
    }

    public function render()
    {
        return view('components.buttons.disable');
    }
}
