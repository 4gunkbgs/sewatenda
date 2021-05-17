<?php

namespace App\Http\Livewire;
use App\Models\Barang;
use App\Models\JenisBarang;

use Livewire\Component;

class DashboardPage extends Component
{
    public $isOpen = false;   
    public $barang;
    public $jenisbarang;
    public $namajenisbarang;
    public $id_barang, $nama, $jenis_barang_id, $stok, $harga, $ganti_rusak, $ganti_hilang;
    public $formStatus  = '';

    public function render()
    {
        $this->barang = Barang::with('jenisBarang')->get();
        $this->jenisbarang = JenisBarang::all();
        return view('livewire.dashboard-page')->layout('layouts.master');
    }

    public function showModal($formStatus){        
        $this->isOpen = true;
        $this->formStatus = $formStatus;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function store(){
        
        $this->validate(
            [
                'id_barang'         =>  'min:4|max:4',
                'nama'              =>  'max:30',
                'jenis_barang_id'   =>  'required',  
                'stok'              =>  'numeric|max:500',
                'harga'             =>  'numeric|min:10000',
                'ganti_rusak'       =>  'numeric|min:10000',
                'ganti_hilang'      =>  'numeric|min:10000',
            ]
        );
        
        Barang::updateOrCreate(['id_barang' => $this->id_barang], [
            'nama' => $this->nama,
            'jenis_barang_id' => $this->jenis_barang_id,             
            'stok' => $this->stok,
            'harga' => $this->harga,
            'ganti_rusak' => $this->ganti_rusak,
            'ganti_hilang' => $this->ganti_hilang
        ]);

        // Barang::createOrUpdate([
        //     'id_barang' => $this->id_barang,            
        //     'nama' => $this->nama,
        //     'jenis_barang_id' => $this->jenis_barang_id,             
        //     'stok' => $this->stok,
        //     'harga' => $this->harga,
        //     'ganti_rusak' => $this->ganti_rusak,
        //     'ganti_hilang' => $this->ganti_hilang
        // ]);

        $this->hideModal();

        session()->flash('message', $this->id_barang ? 'Barang Berhasil diupdate' : 'Barang Berhasil dibuat');

        $this->id_barang = '';
        $this->nama = '';
        $this->jenis_barang_id = '';
        $this->stok = '';
        $this->harga = '';
        $this->ganti_rusak = '';
        $this->ganti_hilang = '';
    }

    public function edit($id){
        
        $barang = Barang::with('jenisBarang')->find($id);
        
        $this->id_barang = $id;
        $this->nama = $barang->nama;
        $this->jenis_barang_id = $barang->jenisBarang->id; 
        $this->namajenisbarang = $barang->jenisBarang->jenis_barang;
        $this->stok = $barang->stok;
        $this->harga = $barang->harga;
        $this->ganti_rusak = $barang->ganti_rusak;
        $this->ganti_hilang = $barang->ganti_hilang;
        
        $this->showModal('edit');                
    } 

    public function delete($id){
        $barang = Barang::find($id)->delete();
    }
}