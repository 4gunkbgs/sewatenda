<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Pesanan;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;

class SewaComponent extends Component
{
    public $barang;
    public $jenisbarang;
    public $jumlah_pesanan, $tanggal_mulai, $tanggal_selesai, $barang_id;
    public $validasi = true;


    public function render()
    {   
        // if (Auth::User()){
        //     return view('livewire.sewa-component')->layout('layouts.master');
        // } else {
        //     return;
        // }
        return view('livewire.sewa-component')->layout('layouts.master');     
    }

    public function mount($id)
    { 
        $this->barang = Barang::with('jenisBarang')->find($id);     
    }

    public function store($id){
              
        $this->validate(
            [
                'jumlah_pesanan'    =>  'required|numeric',
                'tanggal_mulai'     =>  'required|date',
                'tanggal_selesai'   =>  'required|date',                                 
            ]
        );

        $user_id = auth()->user()->id;                
        
        if ($this->barang->stok - $this->jumlah_pesanan < 0){
            $this->validasi = false;                                
        } else {
            Pesanan::create([
                'jumlah_pesanan'    => $this->jumlah_pesanan,
                'tanggal_mulai'     => $this->tanggal_mulai,
                'tanggal_selesai'   => $this->tanggal_selesai,
                'barang_id'         => $id,
                'users_id'          => $user_id,
            ]);

            session()->flash('message', 'Berhasil Menyewa! Silahkan Cek Pesanan Anda');

            return redirect()->to('/');
        }                
        
    }

    
   
}