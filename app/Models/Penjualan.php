<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'penjualan';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'pelanggan_id',
        'tanggal_penjualan',
        'total_harga'
    ];

    // Relasi dengan tabel detail_penjualan
    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'penjualan_id', 'id');
    }

    // Relasi dengan tabel pengguna
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan tabel pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'pelanggan_ID');
    }
}
