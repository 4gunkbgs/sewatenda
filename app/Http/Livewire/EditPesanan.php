<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\Barang;

class EditPesanan extends Component
{
    public $pesanans;
    public $barang;    
    

    public function render()
    {
        $this->pesanans = Pesanan::with('barang','user')->get();     
        return view('livewire.edit-pesanan')->layout('layouts.master');
    }

    public function konfirm($id){

        $pesanan = Pesanan::find($id);         
        $barang = Barang::find($pesanan->barang_id);             
        
        if ($pesanan->barang_id == $barang->id_barang){            
             $barang->stok = $barang->stok - $pesanan->jumlah_pesanan;
             $barang->save();
        }

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