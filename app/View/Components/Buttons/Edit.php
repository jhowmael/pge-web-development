<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Edit extends Component
{
  
    public $route;
    public $id;
    public $text;

    public function __construct($route = '', $id = '', $text = 'Editar')
    {
        $this->route = $route;
        $this->id = $id;
        $this->text = $text;

    }

    public function render()
    {
        return view('components.buttons.edit');
    }
}
