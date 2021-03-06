<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = ['id_barang', 'jenis', 'nama', 'stok', 'harga', 'ganti_rusak', 'ganti_hilang', 'jenis_barang_id', 'gambar', 'deskripsi'];
    
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
    
    use HasFactory;
}