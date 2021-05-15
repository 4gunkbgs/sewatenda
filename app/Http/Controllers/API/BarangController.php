<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(){

        $barang = Barang::with('jenisBarang')->get();
        
        return response()->json($barang);
    }

    public function show($id){

        $barang = Barang::with('jenisBarang')->find($id);
        
        if (!$barang){
            return response()->json([
                'error' => 'barang tidak ditemukan'
            ], 404);
        }

        return response()->json($barang);
    }

    public function store(Request $request){

        $validasi = $this->validate($request, [
            'id_barang'         =>  'required|unique:barang|min:4|max:4',
            'nama'              =>  'required|max:30',
            'jenis_barang_id'   =>  'required',
            'stok'              =>  'required|numeric|max:500',
            'harga'            =>   'required|numeric|min:10000',
            'ganti_rusak'       =>  'required|numeric|min:10000',
            'ganti_hilang'      =>  'required|numeric|min:10000',
        ]);

        try{            
            $response = Barang::create($validasi);
            return response()->json([
                'success' => true,
                'message'=>'tambah barang success',                
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Error',               
            ], 422);
        }                      
    }

    public function update(Request $request, $id){        

        //karna kalo update gak bisa ganti id sama jenis
        $validasi = $this->validate($request, [            
            'nama'              =>  'required|max:30',            
            'stok'              =>  'required|numeric|max:500',
            'harga'            =>   'required|numeric|min:10000',
            'ganti_rusak'       =>  'required|numeric|min:10000',
            'ganti_hilang'      =>  'required|numeric|min:10000',
        ]);

        try {            
            $response = Barang::find($id);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message'=>'update success',                
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Error',                
            ],422);
        }
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return response()->json([
            'message' => 'berhasil didelete',
        ]);
    }
}