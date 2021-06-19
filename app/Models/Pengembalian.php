<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $table = 'pengembalian';
    protected $primaryKey = 'id';

    protected $fillable = ['pesanan_id','tanggal_kembali','jumlah_hilang', 'jumlah_rusak', 'denda'];

    use HasFactory;
}