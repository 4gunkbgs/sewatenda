<?php

namespace App\Http\Livewire;
use App\Models\Barang;
use App\Models\JenisBarang;

use Livewire\Component;
use Livewire\WithFileUploads;

class DashboardPage extends Component
{
    use WithFileUploads;

    public $isOpen = false;       
    public $barang;
    public $jenisbarang;
    public $namajenisbarang;
    public $id_barang, $nama, $jenis_barang_id, $stok, $harga, $ganti_rusak, $ganti_hilang;
    public $formStatus  = '';
    public $gambar;
    public $deskripsi;   
    //test
    public $namaGambar;

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

        $this->id_barang = '';
        $this->nama = '';
        $this->jenis_barang_id = '';
        $this->stok = '';
        $this->harga = '';
        $this->ganti_rusak = '';
        $this->ganti_hilang = '';
        $this->deskripsi = '';
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
                'gambar'            =>  'required',                           
                'deskripsi'         =>  'required',
            ]
        );

        //cek kalo gambarnya isi dan tipe gambarnya objek. Kalo misal ga mau berubah tunggu aja dulu
        //ampe dia otomatis berubah harusnya mau nanti :)
        if (!empty($this->gambar) && gettype($this->gambar) == "object"){
                
                $this->gambar->store('photos', 'public');

                // $this->$namaGambar = $this->gambar->hashName();                

                Barang::updateOrCreate(['id_barang' => $this->id_barang], [
                    'nama' => $this->nama,
                    'jenis_barang_id' => $this->jenis_barang_id,             
                    'stok' => $this->stok,
                    'harga' => $this->harga,
                    'ganti_rusak' => $this->ganti_rusak,
                    'ganti_hilang' => $this->ganti_hilang, 
                    'gambar' => $this->gambar->hashName(),                       
                    'deskripsi' => $this->deskripsi,
                ]);
            } else {
                Barang::updateOrCreate(['id_barang' => $this->id_barang], [
                    'nama' => $this->nama,
                    'jenis_barang_id' => $this->jenis_barang_id,             
                    'stok' => $this->stok,
                    'harga' => $this->harga,
                    'ganti_rusak' => $this->ganti_rusak,
                    'ganti_hilang' => $this->ganti_hilang,                           
                    'deskripsi' => $this->deskripsi,  
                ]);
            }                                                 
                                                                              
        $this->hideModal();

        session()->flash('message', $this->formStatus == "edit" ? 'Barang Berhasil diupdate' : 'Barang Berhasil dibuat');

        $this->id_barang = '';
        $this->nama = '';
        $this->jenis_barang_id = '';
        $this->stok = '';
        $this->harga = '';
        $this->ganti_rusak = '';
        $this->ganti_hilang = '';
        $this->deskripsi = '';
        $this->gambar = '';
    }

    public function edit($id){
        
        $barang = Barang::with('jenisBarang')->findOrFail($id);
              
        $this->id_barang = $id;
        $this->nama = $barang->nama;
        $this->jenis_barang_id = $barang->jenisBarang->id; 
        $this->namajenisbarang = $barang->jenisBarang->jenis_barang;
        $this->stok = $barang->stok;
        $this->harga = $barang->harga;
        $this->ganti_rusak = $barang->ganti_rusak;
        $this->ganti_hilang = $barang->ganti_hilang;        
        $this->deskripsi = $barang->deskripsi;
        $this->gambar = $barang->gambar;
        //percobaan
        // $this->namaGambar = $this->gambar;


        $this->showModal('edit');                
    } 

    public function delete($id){
        $barang = Barang::find($id)->delete();
    }
}