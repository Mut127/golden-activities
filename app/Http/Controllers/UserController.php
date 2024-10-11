<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Untuk penyimpanan gambar

class UserController extends Controller
{
    public function index()
    {
        // Mendapatkan semua pengguna
        $users = User::all();
        return view('page.admin-user', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|string|max:15',
            'profile_image' => 'nullable|image',
            'usertype' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Proses unggah gambar profil jika ada
        $imagePath = $request->file('profile_image') ? $request->file('profile_image')->store('profile_images', 'public') : null;

        // Buat pengguna baru
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number' => $validated['number'],
            'profile_image' => $imagePath,
            'usertype' => $validated['usertype'],
            'password' => Hash::make($validated['password']), // Hashing password
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        // Mendapatkan data pengguna berdasarkan ID
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Mendapatkan data pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi input pengguna
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'number' => 'required|string|max:15',
            'profile_image' => 'nullable|image',
            'usertype' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Proses unggah gambar profil jika ada
        if ($request->hasFile('profile_image')) {
            // Hapus gambar lama jika ada
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
            // Simpan gambar baru
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        } else {
            $imagePath = $user->profile_image;
        }

        // Update data pengguna
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number' => $validated['number'],
            'profile_image' => $imagePath,
            'usertype' => $validated['usertype'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password, // Update password jika ada
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        // Mendapatkan data pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Hapus gambar profil jika ada
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        // Hapus data pengguna
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
