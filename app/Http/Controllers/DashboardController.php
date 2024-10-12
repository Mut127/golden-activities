<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Artikel;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data dari database
        $totalAktivitas = Aktivitas::count();
        $totalArtikel = Artikel::count();
        $totalUser = User::count();

        // Kirim data ke view
        return view('page.admin-dashboard', compact('totalAktivitas', 'totalArtikel', 'totalUser'));
    }
}
