<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\Barang;
use App\Models\user;

class PesananComponent extends Component
{
    public $pesanans; 

    public function render()
    {        
        return view('livewire.pesanan-component')->layout('layouts.master');
    }

    public function mount($id){
        $this->pesanans = Pesanan::where('users_id', $id)->get();        
    }
}