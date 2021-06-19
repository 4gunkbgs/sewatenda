<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\Pengembalian;
use App\Models\Barang;

class PengembalianComponent extends Component
{
    public $pesanans;
    public $pesanan_id;
    public $isOpen = false; 
    public $jumlahrusak;
    public $jumlahhilang;
    public $jumlahpesanan;
    public $jumlahbarang;
    public $barang;
    public $pengembalian;
    public $newpengembalian = [];
    public $i = 0;
    public $prevuser = NULL;
    public $subtotal = 0;
    public $total = 0;

    public function render()
    {   
        $this->pesanans = Pesanan::with('barang','user')->get(); 
        // dd($this->pesanans[0]->barang);
        $this->pengembalian = Pengembalian::All();           
               

        return view('livewire.pengembalian-component')->layout('layouts.master');
    }

    public function showModal($id){  
              
        $this->isOpen = true;
        $this->pesanan_id = $id;        
        $this->jumlahpesanan = $id['jumlah_pesanan']; 
        $this->jumlahbarang = $this->pesanan_id['barang']['stok'];    
        // dd($this->jumlahbarang)          ;
        $this->barang = Barang::find($id['barang_id']);                
    }

    public function hideModal(){
        $this->isOpen = false;        
    }

    public function store(){
        $this->validate(
            [
                'pesanan_id'        => 'required',
                'jumlahhilang'     =>  'required',
                'jumlahrusak'      =>  'required',                
            ]
        );

        $denda = $this->barang->ganti_rusak * $this->jumlahrusak + $this->barang->ganti_hilang * $this->jumlahhilang;
        $date = date('Y-m-d H:i:s');       

        
        Pengembalian::create([
            'pesanan_id'            => $this->pesanan_id['id'],
            'tanggal_kembali'       => $date,        
            'jumlah_rusak'          => $this->jumlahrusak,
            'jumlah_hilang'         => $this->jumlahhilang,
            'denda'                 => $denda,            
        ]);

        Pesanan::where('id', $this->pesanan_id['id'])->update(['status_pengembalian' => 1]);

        if($this->prevuser){
            if($this->prevuser == $this->pesanan_id['users_id']){
                $this->newpengembalian[$this->i] = [
                    'pesanan_id'            => $this->pesanan_id['id'],
                    'tanggal_kembali'       => $date,        
                    'jumlah_rusak'          => $this->jumlahrusak,
                    'jumlah_hilang'         => $this->jumlahhilang,
                    'denda'                 => $denda,
                    'nama'                  => $this->barang->nama, 
                    'subtotal'              => $this->barang->harga * $this->jumlahpesanan + $denda,                              
                ]; 

                $this->total += $this->barang->harga * $this->jumlahpesanan + $denda;

                
                $this->i++;
            } else {
                $this->newpengembalian = [];
                $this->i = 0;
                $this->newpengembalian[$this->i] = [
                    'pesanan_id'            => $this->pesanan_id['id'],
                    'tanggal_kembali'       => $date,        
                    'jumlah_rusak'          => $this->jumlahrusak,
                    'jumlah_hilang'         => $this->jumlahhilang,
                    'denda'                 => $denda,
                    'nama'                  => $this->barang->nama, 
                    'subtotal'              => $this->barang->harga * $this->jumlahpesanan + $denda,
                    'total'                            
                ];   

                $this->total += $this->barang->harga * $this->jumlahpesanan + $denda;
                
                $this->prevuser = $this->pesanan_id['users_id'];
                $this->i++;
            }            
        } else {
            $this->newpengembalian[$this->i] = [
                'pesanan_id'            => $this->pesanan_id['id'],
                'tanggal_kembali'       => $date,        
                'jumlah_rusak'          => $this->jumlahrusak,
                'jumlah_hilang'         => $this->jumlahhilang,
                'denda'                 => $denda,
                'nama'                  => $this->barang->nama, 
                'subtotal'              => $this->barang->harga * $this->jumlahpesanan + $denda, 
            ]; 

            $this->total += $this->barang->harga * $this->jumlahpesanan + $denda;

            $this->prevuser = $this->pesanan_id['users_id'];
            $this->i++;
            
        }
               
        Barang::where('id_barang', $this->pesanan_id['barang_id'])->update(['stok' => $this->jumlahbarang + ($this->jumlahpesanan - ($this->jumlahrusak + $this->jumlahhilang))]);

        $this->hideModal();            

    }
}