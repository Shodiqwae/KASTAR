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
        // Ambil ID user yang sedang login
        $userId = auth()->user()->id;

        // Ambil history transaksi hanya untuk petugas yang sedang login
        $history = Penjualan::select('penjualan.id', 'users.name as nama_user', 'penjualan.pelanggan_id', 'penjualan.tanggal_penjualan', 'penjualan.total_harga')
            ->join('users', 'users.id', '=', 'penjualan.user_id')
            ->where('penjualan.user_id', $userId) // Filter by logged-in user ID
            ->get();

        // Ambil data detail penjualan
        $details = DetailPenjualan::select('penjualan_id', 'products.nama_product', 'detail_penjualan.jumlah_produk', 'detail_penjualan.subtotal')
            ->join('products', 'detail_penjualan.produk_id', '=', 'products.id')
            ->whereIn('penjualan_id', $history->pluck('id')) // Filter detail penjualan by penjualan ID
            ->get()
            ->groupBy('penjualan_id');

        return view('Petugas.HistoryP', compact('history', 'details'));
    }

    public function HistoryAdmin()
{
    $history = Penjualan::select('penjualan.id', 'users.name as nama_user', 'penjualan.pelanggan_id', 'penjualan.tanggal_penjualan', 'penjualan.total_harga')
        ->join('users', 'users.id', '=', 'penjualan.user_id')
        ->get();

    // Ambil data detail penjualan dan kelompokkan berdasarkan penjualan_id
    $details = DetailPenjualan::select('penjualan_id', 'products.nama_product', 'detail_penjualan.jumlah_produk', 'detail_penjualan.subtotal')
        ->join('products', 'detail_penjualan.produk_id', '=', 'products.id')
        ->get()
        ->groupBy('penjualan_id');

    // Kelompokkan history transaksi berdasarkan penjualan_id
    $groupedHistory = $history->map(function($item) use ($details) {
        $item->details = $details->get($item->id, collect());
        return $item;
    });

    return view('Admin.HistoryA', compact('groupedHistory'));
}

}
