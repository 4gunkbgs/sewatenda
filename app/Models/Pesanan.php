<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';

    protected $fillable = ['jumlah_pesanan', 
                            'total_bayar',
                            'tanggal_mulai',
                            'tanggal_selesai',
                            'tanggal_kembali',
                            'barang_id',
                            'users_id',
                            'konfirm',
                            'ganti_rusak',
                            'ganti_hilang'
                        ];

    
                        
    use HasFactory;
}