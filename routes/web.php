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


Route::get('/aktivitas', function () {
    return view('page.aktivitas');
});
Route::get('/profile', function () {
    return view('page.profile');
});
Route::get('/reward', function () {
    return view('page.reward');
});
Route::get('/todolist', function () {
    return view('page.todolist');
});
Route::get('/artikel', function () {
    return view('page.artikel');
});
Route::get('/detailartikel', function () {
    return view('page.detailartikel');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
});
