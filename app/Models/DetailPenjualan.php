<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'detail_penjualan';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'jumlah_produk',
        'subtotal'
    ];

    // Relasi dengan tabel penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id', 'id');
    }

    // Relasi dengan tabel produk
    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id', 'id');
    }
}
