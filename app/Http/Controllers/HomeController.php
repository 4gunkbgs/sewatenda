<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
    public function index(){

        $barang = Barang::with('jenisBarang')->paginate(7);        
        return view('home', ['barang' => $barang]);
    }

    public function cari(Request $request){

        $cari = $request->search;  

        $barang = Barang::where('nama','like','%'.$cari.'%')->paginate(7);        
        return view ('home', ['barang' => $barang]);
    }

    public function sewa(){

        return view('sewa');
    }
}