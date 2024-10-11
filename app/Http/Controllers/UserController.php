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
        $users = User::all();
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return view('page.admin-user', compact('users'));
        } else {
            return view('page.user', compact('users'));
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

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('page.edit-user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
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
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('users', 'public');
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
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
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
