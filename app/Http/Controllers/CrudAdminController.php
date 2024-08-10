<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrudAdminController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->get();
        return view('Admin.CrudAdmin', compact('admin'));
    }

    public function create()
    {
        return view('Admin.CreateAdmin');
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
            'role' => 'admin',
            'alamat' => $request->alamat,
        ]);


        return redirect()->route('CrudAdmin.index')->with('success', 'Petugas added successfully.');
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('Admin.EditAdmin', compact('admin'));
    }

    // Memperbarui data admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8', // Tambahkan validasi untuk password baru
            'alamat' => 'nullable|string|max:255',
        ]);

        $admin = User::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        // Jika password baru disertakan dalam permintaan, perbarui password
        if ($request->has('password')) {
            $admin->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->route('CrudAdmin.index')->with('success', 'Petugas updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('CrudAdmin.index')->with('success', 'Petugas deleted successfully.');
    }
}
