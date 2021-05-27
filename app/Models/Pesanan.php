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
                            'jumlah_rusak',
                            'jumlah_hilang'
                        ];

    
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
        
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    use HasFactory;
}