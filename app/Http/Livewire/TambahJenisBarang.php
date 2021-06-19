<?php

namespace App\Http\Livewire;

use App\Models\JenisBarang;

use Livewire\Component;

class TambahJenisBarang extends Component
{
    public $isOpen = false; 
    public $jenisbarang;
    public $namabarang = '';
    public $jenisbarangId;
    public $formStatus  = '';

    public function render()
    {
        $this->jenisbarang = JenisBarang::get();
        return view('livewire.tambah-jenis-barang')->layout('layouts.master');
    }

    public function showModal($formStatus){        
        $this->isOpen = true;
        $this->formStatus = $formStatus;       
    }

    public function hideModal(){
        $this->isOpen = false;
              
    }

    public function store(){        

        JenisBarang::updateOrCreate(['id' => $this->jenisbarangId], [
            'jenis_barang' => $this->namabarang,
        ]);

        $this->hideModal();

        session()->flash('message', $this->formStatus == "edit" ? 'Barang Berhasil diupdate' : 'Barang Berhasil dibuat');

        $this->jenisbarangId = '';
        $this->namabarang = '';
    }

    public function edit($id){
        $jenisbarang = JenisBarang::findOrFail($id);
        $this->jenisbarangId = $id;
        $this->namabarang = $jenisbarang->jenis_barang;

        $this->showModal('edit'); 
    }

    public function delete($id){
        $jenisbarang = JenisBarang::findOrFail($id)->delete();        
    }
}