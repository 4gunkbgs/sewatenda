<?php

namespace App\Http\Livewire;
use App\Models\Barang;
use App\Models\JenisBarang;

use Livewire\Component;

class HomeComponent extends Component
{
    public $barang;
    public $jenisbarang;
    
    public function render()
    {
        $this->barang = Barang::with('jenisBarang')->get();
        $this->jenisbarang = JenisBarang::all();        
        return view('livewire.home-component')->layout('layouts.master');
    }
}