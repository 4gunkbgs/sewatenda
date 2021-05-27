<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;

class EditPesanan extends Component
{
    public $pesanans;    
    

    public function render()
    {
        $this->pesanans = Pesanan::with('barang','user')->get();     
        return view('livewire.edit-pesanan')->layout('layouts.master');
    }

    public function konfirm($id){

        $pesanan = Pesanan::find($id);

        $pesanan->konfirm = 1;
        $pesanan->save(); 

    }

    public function batalkan($id){

        $pesanan = Pesanan::find($id);
        
        $pesanan->konfirm = 2;
        $pesanan->save();
    }

    public function destroy($id){

        $pesanan = Pesanan::find($id);
        $pesanan->delete();
    }
}