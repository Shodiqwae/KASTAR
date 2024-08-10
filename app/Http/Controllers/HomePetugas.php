<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;

class HomePetugas extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Petugas.HomeP', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'totalHarga' => 'required|numeric|min:0',
            'details' => 'required|array',
            'details.*.productId' => 'required|exists:products,id',
            'details.*.quantity' => 'required|integer|min:1',
            'details.*.subtotal' => 'required|numeric|min:0',
        ]);

        // Create a new customer if needed
        $pelanggan = Pelanggan::create(); // Ensure this model handles defaults if needed

        // Create the sales record
        $penjualan = Penjualan::create([
            'user_id' => auth()->id(), // Assuming you have authentication
            'pelanggan_id' => $pelanggan->pelanggan_ID,
            'tanggal_penjualan' => now(),
            'total_harga' => $request->totalHarga,
        ]);

        // Create the detail sales records and update product stock
        foreach ($request->details as $detail) {
            // Find the product and ensure it exists
            $product = Product::find($detail['productId']);
            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found.'], 404);
            }

            // Ensure sufficient stock is available
            if ($product->stock < $detail['quantity']) {
                return response()->json(['success' => false, 'message' => 'Insufficient stock for product ' . $product->id], 400);
            }

            // Create the detail sales record
            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $detail['productId'],
                'jumlah_produk' => $detail['quantity'],
                'subtotal' => $detail['subtotal'],
            ]);

            // Update product stock
            $product->stock -= $detail['quantity'];
            $product->save();
        }

        return response()->json(['success' => true, 'message' => 'Order successfully placed.']);
    }
}
