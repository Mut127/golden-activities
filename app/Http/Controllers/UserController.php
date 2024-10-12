<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request): View
    {

        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $users = User::all();
            return view('page.admin-user', compact('users'));
        } else {
            $user = User::where('id', Auth::id())->first();
            return view('page.profile', compact('user'));
        }
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('page.detailuser', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'number' => 'required|string|max:15',
            'profile_image' => 'nullable|image',
            'usertype' => 'required|in:admin,user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan gambar profil jika ada
        $imagePath = $request->file('profile_image') ? $request->file('profile_image')->store('users', 'public') : null;

        // Buat pengguna baru
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number' => $validated['number'],
            'profile_image' => $imagePath,
            'usertype' => $validated['usertype'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        // Cari pengguna berdasarkan id
        $user = User::findOrFail($id);

        // Tipe form edit
        $formtype = 'edit';

        // Render view 'page.edit-user' dengan data user dan formtype
        return view('page.edit-user', compact('user', 'formtype'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'number' => ['required', 'string', 'max:15'],
            'profile_image' => ['nullable', 'file', 'image', 'max:2048'], // nullable agar tidak wajib diisi saat update
            'usertype' => ['required', 'in:admin,pengguna'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        // Cari pengguna yang akan diupdate
        $user = User::findOrFail($id);

        // Jika ada file gambar profil baru yang diunggah, perbarui juga profile_image
        if ($request->hasFile('profile_image')) {
            // Simpan gambar baru
            $filePath = $request->file('profile_image')->store('users', 'public');

            // Hapus gambar lama jika ada
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Update kolom profile_image dengan path baru
            $user->profile_image = $filePath;
        }

        // Update data pengguna
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->number = $validatedData['number'];
        $user->usertype = $validatedData['usertype'];

        // Update password jika ada
        if ($validatedData['password']) {
            $user->password = Hash::make($validatedData['password']);
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect ke halaman index pengguna dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }


    public function destroy(User $user)
    {
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }

    public function home(Request $request)
    {
        $users = User::query();
        $latestUsers = $users->orderBy('created_at', 'desc')->paginate(4);

        return view('page.beranda', compact('latestUsers'));
    }

    public function user(Request $request)
    {
        $users = User::query();
        $users = $users->paginate(8);
        return view('page.user', compact('users'));
    }
}
