<?php

namespace App\Http\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class InputHandling extends Component
{
    public function render()
    {
        return view('livewire.inputHandling')
            ->layout('layouts.app');
    }
}
