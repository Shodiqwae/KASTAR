<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudPetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        return view('Admin.CrudPetugas', compact('petugas'));
    }

    public function create()
    {
        return view('Admin.CreatePetugas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'petugas',
            'alamat' => $request->alamat,
        ]);


        return redirect()->route('CrudPetugas.index')->with('success', 'Petugas added successfully.');
    }

    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('Admin.EditPetugas', compact('petugas'));
    }

    // Memperbarui data petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8', // Tambahkan validasi untuk password baru
            'alamat' => 'nullable|string|max:255',
        ]);

        $petugas = User::findOrFail($id);
        $petugas->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        // Jika password baru disertakan dalam permintaan, perbarui password
        if ($request->has('password')) {
            $petugas->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->route('CrudPetugas.index')->with('success', 'Petugas updated successfully.');
    }

    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return redirect()->route('CrudPetugas.index')->with('success', 'Petugas deleted successfully.');
    }
}
