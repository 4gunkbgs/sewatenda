<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PengembalianComponent extends Component
{
    public function render()
    {
        return view('livewire.pengembalian-component')->layout('layouts.master');
    }
}