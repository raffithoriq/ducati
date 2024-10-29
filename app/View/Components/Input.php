<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $inputType;
    public $inputName;
    public $inputClass;
    public $placeholder;
    public $value;

    public function __construct($inputType = 'text', $inputName = '', $inputClass = 'form-control', $placeholder = '', $value = '')
    {
        $this->inputType = $inputType;
        $this->inputName = $inputName;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.input');
    }
}
