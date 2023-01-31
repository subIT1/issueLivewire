<?php

namespace App\Http\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class InputDialog extends Dialog
{
    public $name;
    public $email;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
    ];

    protected array $messages = [
        'name.required' => 'name required',
        'name.name' => 'name length incorrect',
        'email.required' => 'email required',
        'email.name' => 'email length incorrect',
    ];

    public function render()
    {
        return view('livewire.input-dialog');
    }

    /**
     * @throws ValidationException
     */
    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submit(): void
    {
        $validatedData = $this->validate();
        dd($validatedData);
    }
}
