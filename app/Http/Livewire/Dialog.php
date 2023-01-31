<?php

namespace App\Http\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dialog extends Component
{
    public bool $show = false;

    protected $listeners = [
        'show' => 'show',
        'hide' => 'hide',
    ];

    public function show($uuid): void
    {
        $this->show = true;
    }

    public function hide(): void
    {
        $this->show = false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('livewire.dialog');
    }
}
