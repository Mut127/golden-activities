<?php

use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.beranda');
});
Route::get('login&register', function () {
    return view('sesi.login&register');
});
Route::get('/sesi', [SessionController::class, 'login'])->name('login');
Route::post('/sesi/loggin', [SessionController::class, 'loggin']);

Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
    

    Route::view('/aktivitas', 'page.aktivitas'); // Menggunakan path 'page.aktivitas'

    
});
