<?php

namespace App\Http\Controllers;

use HTMLPurifier;
use HTMLPurifier_Config;
use App\Models\Aktivitas;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class AktivitasController extends Controller
{
    public function index(Request $request): View
    {
        $aktivitas = Aktivitas::all();
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return view('page.admin-aktivitas', compact('aktivitas'));
        } else {
            return view('page.aktivitas', compact('aktivitas'));
        }
    }

    public function show($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $users = User::all();
        return view('page.daftar', compact('aktivitas', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image_path' => 'nullable|image',
            'tgl_pelaksanaan' => 'required|date',
            'waktu_pelaksanaan' => 'required',
            'alamat' => 'required|string',
            'kuota' => 'required|integer',
            'kategori' => 'required|in:online,offline',
            'user_id' => 'nullable',
        ]);

        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p,a[href],ul,ol,li,b,i,strong,em,br,img[src|alt|title|width|height]');
        $purifier = new HTMLPurifier($config);
        $purifiedContent = $purifier->purify($validated['deskripsi']);

        $user = Auth::user();
        $imagePath = $request->file('image_path') ? $request->file('image_path')->store('aktivitas', 'public') : null;

        Aktivitas::create(array_merge($validated, [
            'deskripsi' => $purifiedContent,
            'image_path' => $imagePath,
            'user_id' => $user->id,
        ]));

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas created successfully.');
    }

    public function edit($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('page.edit-aktivitas', compact('aktivitas'));
    }

    public function update(Request $request, Aktivitas $aktivitas)
    {

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image_path' => 'nullable|image',
            'tgl_pelaksanaan' => 'required|date',
            'waktu_pelaksanaan' => 'required',
            'alamat' => 'required|string',
            'kuota' => 'required|integer',
            'kategori' => 'required|in:online,offline',
        ]);

        // HTML Purifier untuk deskripsi
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p,a[href],ul,ol,li,b,i,strong,em,br,img[src|alt|title|width|height]');
        $purifier = new HTMLPurifier($config);
        $purifiedContent = $purifier->purify($validated['deskripsi']);

        // Cek jika ada file gambar yang baru di-upload
        if ($request->hasFile('image_path')) {
            if ($aktivitas->image_path) {
                Storage::delete('public/' . $aktivitas->image_path); // Hapus gambar lama
            }
            // Simpan gambar baru
            $imagePath = $request->file('image_path')->store('aktivitas', 'public');
        } else {
            // Jika tidak ada gambar baru, tetap gunakan yang lama
            $imagePath = $aktivitas->image_path;
        }

        // Update data aktivitas
        $aktivitas->update([
            'judul' => $validated['judul'],
            'deskripsi' => $purifiedContent,
            'image_path' => $imagePath,
            'tgl_pelaksanaan' => $validated['tgl_pelaksanaan'],
            'waktu_pelaksanaan' => $validated['waktu_pelaksanaan'],
            'alamat' => $validated['alamat'],
            'kuota' => $validated['kuota'],
            'kategori' => $validated['kategori'],
        ]);

        // Redirect setelah update
        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas updated successfully.');
    }

    public function destroy(Aktivitas $aktivitas)
    {
        $aktivitas->delete();
        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas deleted successfully.');
    }
}
