<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'pelanggan';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        // Tambahkan kolom yang bisa diisi jika ada selain timestamps
    ];

    // Menentukan bahwa primary key adalah big integer
    protected $primaryKey = 'pelanggan_ID';

    // Non-Auto-Increment
    public $incrementing = true;

    // Timestamps
    public $timestamps = true;

    // Relasi dengan tabel penjualan
    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'pelanggan_id', 'pelanggan_ID');
    }
}
