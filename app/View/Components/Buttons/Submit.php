<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Submit extends Component
{
  
    public $text;

    public function __construct($text = 'Salvar')
    {
        $this->text = $text;
    }

    public function render()
    {
        return view('components.buttons.submit');
    }
}
