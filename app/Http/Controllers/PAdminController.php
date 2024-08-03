<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PAdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Admin.Product.product', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'gambar' => 'nullable|image',
        ]);

        $gambarPath = $request->file('gambar') ? $request->file('gambar')->store('images', 'public') : null;

        Product::create([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.Product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_product' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'gambar' => 'nullable|image',
        ]);

        $product = Product::findOrFail($id);

        $gambarPath = $product->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        $product->update([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus gambar jika ada
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
