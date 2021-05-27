<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;

class PengembalianComponent extends Component
{
    public $pesanans;

    public function render()
    {   
        $this->pesanans = Pesanan::with('barang','user')->get();      
        return view('livewire.pengembalian-component')->layout('layouts.master');
    }
}