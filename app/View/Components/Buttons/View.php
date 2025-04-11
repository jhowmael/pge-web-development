<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class View extends Component
{
  
    public $route;
    public $id;
    public $text;
    public $message;

    public function __construct($route = '', $id = '', $text = 'Visualizar', $message = '')
    {
        $this->route = $route;
        $this->id = $id;
        $this->text = $text;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.buttons.view');
    }
}
