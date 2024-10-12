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
    // Cari aktivitas berdasarkan id
    $aktivitas = Aktivitas::findOrFail($id);
    
    // Tipe form edit
    $formtype = 'edit';
    
    // Render view 'aktivitas.edit' dengan data aktivitas dan formtype
    return view('page.edit-aktivitas', compact('aktivitas', 'formtype'));
}

public function update(Request $request, $id)
{
    // Validasi data
    $validatedData = $request->validate([
        'judul' => ['required', 'string'],
        'deskripsi' => ['required', 'string'],
        'image_path' => ['nullable', 'file', 'image', 'max:2048'], // nullable agar tidak wajib diisi saat update
        'tgl_pelaksanaan' => ['required', 'date'],
        'waktu_pelaksanaan' => ['required'],
        'alamat' => ['required', 'string'],
        'kuota' => ['required', 'integer'],
        'kategori' => ['required', 'in:online,offline'],
    ]);

    // Cari aktivitas yang akan diupdate
    $aktivitas = Aktivitas::findOrFail($id);

    // Update data aktivitas
    $aktivitas->judul = $validatedData['judul'];
    $aktivitas->deskripsi = $validatedData['deskripsi'];
    $aktivitas->tgl_pelaksanaan = $validatedData['tgl_pelaksanaan'];
    $aktivitas->waktu_pelaksanaan = $validatedData['waktu_pelaksanaan'];
    $aktivitas->alamat = $validatedData['alamat'];
    $aktivitas->kuota = $validatedData['kuota'];
    $aktivitas->kategori = $validatedData['kategori'];

    // Jika ada file gambar baru yang diunggah, perbarui juga image_path
    if ($request->hasFile('image_path')) {
        // Simpan gambar baru
        $filePath = $request->file('image_path')->store('aktivitas_images', 'public');

        // Hapus gambar lama jika ada
        if ($aktivitas->image_path) {
            Storage::disk('public')->delete($aktivitas->image_path);
        }

        // Update kolom image_path dengan path baru
        $aktivitas->image_path = $filePath;
    }

    // Simpan perubahan ke database
    $aktivitas->save();

    // Redirect ke halaman index aktivitas dengan pesan sukses
    return redirect()->route('aktivitas.index')->with('success', 'Aktivitas successfully updated!');
}

    public function destroy(Aktivitas $aktivitas)
    {
        $aktivitas->delete();
        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas deleted successfully.');
    }
}
