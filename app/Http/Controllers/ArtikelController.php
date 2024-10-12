<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class ArtikelController extends Controller
{
    public function index(Request $request,): View
    {

        $artikels = Artikel::all();
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return view('page.admin-artikel', compact('artikels'));
        } else {
            return view('page.artikel', compact('artikels'));
        }
    }
    public function show($id)
    {
        $artikels = Artikel::findOrFail($id);
        $users = User::all();
        return view('page.detailartikel', compact('artikels', 'users'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'content' => 'required|string',
        'image_path' => 'nullable|image', // Pastikan gambar valid
        'user_id' => 'nullable',
    ]);

    // Gunakan HTML Purifier untuk membersihkan konten
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.Allowed', 'p,a[href],ul,ol,li,b,i,strong,em,br,img[src|alt|title|width|height]');
    $purifier = new HTMLPurifier($config);
    $purifiedContent = $purifier->purify($validated['content']);

    // Simpan gambar jika ada, atau biarkan null
    $imagePath = $request->file('image_path') ? $request->file('image_path')->store('artikels', 'public') : null;

    // Simpan artikel ke dalam database
    Artikel::create([
        'judul' => $validated['judul'],
        'content' => $purifiedContent,
        'image_path' => $imagePath,
        'user_id' => Auth::user()->id, // Pastikan pengguna saat ini disimpan sebagai penulis
    ]);

    return redirect()->route('artikel.index')->with('success', 'Artikel created successfully.');
}


public function edit($id)
{
    // Cari artikel berdasarkan id
    $artikels = Artikel::findOrFail($id);
    
    // Tipe form edit
    $formtype = 'edit';

    // Render view 'page.edit-artikel' dengan data artikel dan formtype
    return view('page.edit-artikel', compact('artikels', 'formtype'));
}

public function update(Request $request, $id)
{
    // Validasi data
    $validatedData = $request->validate([
        'judul' => ['required', 'string'],
        'content' => ['required', 'string'],
        'image_path' => ['nullable', 'file', 'image', 'max:2048'], // nullable agar tidak wajib diisi saat update
    ]);

    // Cari artikel yang akan diupdate
    $artikels = Artikel::findOrFail($id);

    // HTML Purifier untuk membersihkan konten
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.Allowed', 'p,a[href],ul,ol,li,b,i,strong,em,br,img[src|alt|title|width|height]');
    $purifier = new HTMLPurifier($config);
    $purifiedContent = $purifier->purify($validatedData['content']);

    // Jika ada file gambar baru yang diunggah, perbarui juga image_path
    if ($request->hasFile('image_path')) {
        // Simpan gambar baru
        $filePath = $request->file('image_path')->store('artikel_images', 'public');

        // Hapus gambar lama jika ada
        if ($artikels->image_path) {
            Storage::disk('public')->delete($artikels->image_path);
        }

        // Update kolom image_path dengan path baru
        $artikels->image_path = $filePath;
    }

    // Update data artikel
    $artikels->update([
        'judul' => $validatedData['judul'],
        'content' => $purifiedContent,
        'image_path' => $artikels->image_path ?? $artikels->image_path, // tetap gunakan path lama jika tidak ada yang baru
        'user_id' => Auth::id(), // Mengupdate user_id untuk menyimpan user yang mengupdate
    ]);

    // Redirect ke halaman index artikel dengan pesan sukses
    return redirect()->route('artikels.index')->with('success', 'Artikel successfully updated!');
}


    public function destroy(Artikel $artikels)
    {
        $artikels->delete();
        return redirect()->route('artikel.index')->with('success', 'artikels delete successfully.');
    }

    public function home(Request $request)
    {

        $artikels = Artikel::query();

        $latestArtikels = $artikels->orderBy('created_at', 'desc')->paginate(4);

        return view('page.beranda', compact('latestArtikels'));
    }
    public function artikel(Request $request)
    {

        $artikels = Artikel::query();
        $artikels = $artikels->paginate(8);
        return view('page.artikel', compact('artikels'));
    }
}
