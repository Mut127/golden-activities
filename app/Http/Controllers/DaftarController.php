<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\DaftarKegiatan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function index(Request $request): View
    {

        if (Auth::check() && Auth::user()->usertype == 'admin') {
            $daftar_kegiatans = DaftarKegiatan::all();
            return view('page.admin-daftarkegiatan', compact('daftar_kegiatans'));
        } else {
            $daftar_kegiatans = DaftarKegiatan::where('user_id', Auth::id())->get();
            return view('page.todolist', compact('daftar_kegiatans'));
        }
    }



    public function daftar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tgl_lahir' => 'required|string',
            'alamat' => 'required|string',
            'jk' => 'required|in:laki-laki,perempuan',
            'number' => 'required|string',
            'user_id' => 'nullable',
            'aktivitas_id' => 'required|exists:aktivitas,id',
        ]);


        $user = Auth::user();
        // $aktivitas = Auth::user();

        DaftarKegiatan::create(array_merge($validated, [

            'user_id' => $user->id,
        ]));

        return redirect()->route('daftar_kegiatans.index')->with('success', 'Aktivitas created successfully.');
    }



    public function destroy(DaftarKegiatan $daftar_kegiatans)
    {
        $daftar_kegiatans->delete();
        return redirect()->route('daftar_kegiatans.index')->with('success', 'Aktivitas deleted successfully.');
    }
}
