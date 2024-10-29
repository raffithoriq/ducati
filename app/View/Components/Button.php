<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Button extends Component
{
    public $className;
    public $buttonType;
    public $label;

    public function __construct($className = 'btn-primary', $buttonType = 'button', $label = 'Sign In')
    {
        $this->className = $className;
        $this->buttonType = $buttonType;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.button');
    }
}