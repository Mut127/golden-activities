<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use HTMLPurifier;
use HTMLPurifier_Config;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    return redirect()->route('artikels.index')->with('success', 'Artikel created successfully.');
}


    public function edit($id)
    {
        $artikels = Artikel::findOrFail($id);
        return view('page.edit-artikel', compact('artikels'));
    }

    public function update(Request $request, Artikel $artikels)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'content' => 'required',
            'image_path' => 'nullable|image',
        ]);

        // HTML Purifier untuk deskripsi
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p,a[href],ul,ol,li,b,i,strong,em,br,img[src|alt|title|width|height]');
        $purifier = new HTMLPurifier($config);
        $purifiedContent = $purifier->purify($validated['content']);

        // Update data artikels
        $artikels->update(array_merge($validated, [
            'content' => $purifiedContent,
            'user_id' => Auth::id(),
        ]));

        return redirect()->route('artikel.index')->with('success', 'artikels updated successfully.');
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
