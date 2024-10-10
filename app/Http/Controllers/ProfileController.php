<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Mengembalikan view dari folder page
        return view('page.profile');
    }
}
