<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileAdminController extends Controller
{
    public function profilepetugas()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('Petugas.ProfilePetugas', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user(); // Mengambil data user yang sedang login
        return view('admin.ProfileAdmin', compact('user'));
    }

    public function update(Request $request)
    {


        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'old_password' => 'nullable|string|min:6',
            'new_password' => 'nullable|string|min:6|confirmed', // Validasi konfirmasi password
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('alamat')) {
            $user->alamat = $request->alamat;
        }

        if ($request->filled('new_password') && Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
        }

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $imageName);
            $user->gambar = $imageName;
        }


        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


}
