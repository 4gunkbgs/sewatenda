<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;
use App\Models\JenisBarang;

class Dashboard extends Component
{

    public $barang;
    public $isOpen = "knt";    

    public function render()
    {
        $this->barang = Barang::with('jenisBarang')->get(); 
        return view('livewire.dashboard')
            ->layout('layouts.master');
    }

    public function showModal(){
        dd('epencet');
        $this->isOpen = "true";
    }

    public function hideModal(){
        $this->isOpen = "false";
    }
    
}