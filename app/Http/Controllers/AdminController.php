<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();        

        return view('admin.dashboard', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [            
            'id_barang'         =>  'required|unique:barang|min:5|max:5',
            'nama'              =>  'required|max:30',
            'jenis'             =>  'required',
            'stok'              =>  'required|numeric|max:500',
            'harga '            =>  'required|numeric|min:10000',
            'ganti_rusak'       =>  'required|numeric|min:10000',
            'ganti_hilang'      =>  'required|numeric|min:10000',
        ],
        [
            'id_barang.required'=>  'Id barang harus diisi!' ,  
            'id_barang.unique'  =>  'Id barang sudah pernah dibuat!',
            'id_barang.min'     =>  'Id barang kurang',
            'id_barang.max'     =>  'Id barang lebih',

            'nama.required'     =>  'Nama barang harus diisi!',
            'nama.max'          =>  'Nama barang terlalu panjang',

            'jenis'             =>  'Jenis barang harus diisi!',

            'stok.required'     =>  'Stok barang harus diisi!',            
            'stok.max'          =>  'Stok barang maksimal 500',

            'harga.required'        =>  'Harga Barang harus diisi!',
            'ganti_rusak.required'  =>  'Harga barang rusak harus diisi!',     
            'ganti_hilang.required' =>  'Harga hilang harus diisi!'
        ]);
        
        $barang = new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama_barang;
        $barang->jenis = $request->jenis_barang;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->ganti_rusak = $request->ganti_rusak;
        $barang->ganti_hilang = $request->ganti_hilang;
        $barang->save();

        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambah');
    }
    
    public function edit($id)
    {
        $barang = Barang::find($id);

        return view('admin.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama_barang;
        $barang->jenis = $request->jenis_barang;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->ganti_rusak = $request->ganti_rusak;
        $barang->ganti_hilang = $request->ganti_hilang;
        $barang->save();
        return redirect('/dashboard')->with('status', 'Data Berhasil Diedit');
    }

 
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('/dashboard')->with('status', 'Data Berhasil Dihapus');
    }
}