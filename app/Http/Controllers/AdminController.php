<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\JenisBarang;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('jenisBarang')->paginate(7);       

        return view('admin.dashboard', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisbarang = JenisBarang::all(); 

        return view('admin.tambah', ['jenisbarang' => $jenisbarang]);
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
            'id_barang'         =>  'unique:barang|min:4|max:4',
            'nama'              =>  'max:30',
            'jenis_barang_id'   =>  'required',
            'stok'              =>  'numeric|max:500',
            'harga '            =>  'numeric|min:10000',
            'ganti_rusak'       =>  'numeric|min:10000',
            'ganti_hilang'      =>  'numeric|min:10000',
        ],
        [            
            'id_barang.unique'  =>  'Id barang sudah pernah dibuat!',
            'id_barang.min'     =>  'Id barang kurang',
            'id_barang.max'     =>  'Id barang lebih',
            
            'nama.max'          =>  'Nama barang terlalu panjang',

            'jenis_barang_id'   =>  'Jenis barang harus diisi!',
                    
            'stok.max'          =>  'Stok barang maksimal 500',                      
        ]);
        
        $barang = new Barang;
        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama_barang;
        $barang->jenis_barang_id = $request->jenis_barang_id;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->ganti_rusak = $request->ganti_rusak;
        $barang->ganti_hilang = $request->ganti_hilang;
        $barang->save();

        return redirect('/dashboard')->with('status', 'Data Berhasil Ditambah');
    }
    
    public function edit($id)
    {
        $barang = Barang::with('jenisBarang')->find($id);        
        $jenisbarang = JenisBarang::all(); 

        return view('admin.edit', compact('barang', 'jenisbarang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        
        // $this->validate($request, 
        // [            
        //     'id_barang'         =>  'unique:barang|min:4|max:4',
        //     'nama'              =>  'max:30',
        //     'jenis_barang_id'   =>  'required',
        //     'stok'              =>  'numeric|max:500',
        //     'harga '            =>  'numeric|min:10000',
        //     'ganti_rusak'       =>  'numeric|min:10000',
        //     'ganti_hilang'      =>  'numeric|min:10000',
        // ],
        // [            
        //     'id_barang.unique'  =>  'Id barang sudah pernah dibuat!',
        //     'id_barang.min'     =>  'Id barang kurang',
        //     'id_barang.max'     =>  'Id barang lebih',
            
        //     'nama.max'          =>  'Nama barang terlalu panjang',

        //     'jenis_barang_id'   =>  'Jenis barang harus diisi!',
                    
        //     'stok.max'          =>  'Stok barang maksimal 500',                      
        // ]);

        $barang->id_barang = $request->id_barang;
        $barang->nama = $request->nama_barang;
        $barang->jenis_barang_id = $request->jenis_barang_id;
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

    public function cari(Request $request){

        $cari = $request->search;  

        $barang = Barang::where('nama','like','%'.$cari.'%')->paginate(7);        
        return view('admin.dashboard', ['barang' => $barang]);
    }
}