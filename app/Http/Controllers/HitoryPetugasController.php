<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;
use App\Models\Product;

class HitoryPetugasController extends Controller
{
    public function index()
    {
        $history = Penjualan::select('users.name as nama_user', 'penjualan.pelanggan_id', 'penjualan.tanggal_penjualan', 'penjualan.total_harga', 'products.nama_product', 'detail_penjualan.jumlah_produk')
            ->join('users', 'users.id', '=', 'penjualan.user_id')
            ->leftJoin('detail_penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')
            ->leftJoin('products', 'detail_penjualan.produk_id', '=', 'products.id')
            ->get();

        return view('Petugas.HistoryP', compact('history'));
    }
    public function HistoryAdmin()
    {
        $history = Penjualan::select('users.name as nama_user', 'penjualan.pelanggan_id', 'penjualan.tanggal_penjualan', 'penjualan.total_harga', 'products.nama_product', 'detail_penjualan.jumlah_produk')
            ->join('users', 'users.id', '=', 'penjualan.user_id')
            ->leftJoin('detail_penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')
            ->leftJoin('products', 'detail_penjualan.produk_id', '=', 'products.id')
            ->get();

        return view('Admin.HistoryA', compact('history'));
    }
}
