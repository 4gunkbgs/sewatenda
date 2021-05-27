<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\Barang;
use App\Models\user;

class PesananComponent extends Component
{
    public $pesanans;
    public $id_user; 

    public function render()
    {   
        $this->pesanans = Pesanan::where('users_id', $this->id_user)->get();     
        return view('livewire.pesanan-component')->layout('layouts.master');
    }

    public function mount($id){
        $this->pesanans = Pesanan::where('users_id', $id)->get();
        $this->id_user = $id;        
    }

    public function destroy($id){
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
    }
}