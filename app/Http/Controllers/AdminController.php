<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalAktivitas = Aktivitas::count();
        $totalArtikel = Artikel::count();
        $totalUser = User::count();

        return view('page.admin-dashboard', compact('totalAktivitas', 'totalArtikel', 'totalUser'));
    }
}
