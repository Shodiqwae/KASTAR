<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pelanggan_id')->nullable(); // Sesuaikan nama kolom dengan tabel pelanggan
            $table->date('tanggal_penjualan');
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            // Relasi
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pelanggan_id')->references('pelanggan_ID')->on('pelanggan')->onDelete('set null'); // Mengacu ke pelanggan_ID
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
}
