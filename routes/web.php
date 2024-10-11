<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Aktivitas;
use App\Models\Artikel;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('page.beranda');
// });
Route::get('/', [ArtikelController::class, 'home'])->name('home');
Route::get('login&register', function () {
    return view('sesi.login&register');
});
Route::get('/sesi', [SessionController::class, 'login'])->name('login');
Route::post('/sesi/loggin', [SessionController::class, 'loggin']);

Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create'])->name('sesi.create');


// Route::get('/aktivitas', function () {
//     return view('page.aktivitas');
// });
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

Route::get('/daftar', function () {
    return view('page.daftar'); // Sesuaikan dengan lokasi file Anda
})->name('daftar');

Route::get('/artikel/{id}', function ($id) {
    return view('page.detailartikel'); // Ubah sesuai dengan lokasi view jika berada di subfolder, misal 'pages.detailartikel'
})->name('detailartikel');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/artikels/{id}', [ArtikelController::class, 'show'])->name('artikels.show');
Route::get('/artikel', [ArtikelController::class, 'artikel'])->name('artikel.index');
Route::get('/aktivitas', [AktivitasController::class, 'aktivitas'])->name('aktivitas.index');
Route::get('/aktivitas/{id}', [AktivitasController::class, 'show'])->name('aktivitas.show');

Route::resource('artikels', ArtikelController::class);
Route::resource('aktivitas', AktivitasController::class);

Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/profile', [SessionController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [SessionController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-photo', [SessionController::class, 'changeProfilePhoto'])->name('profile.changePhoto');
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
    Route::get('/profile/editpassword', [SessionController::class, 'password'])->name('profile.password');
    Route::post('/profile/changepasswod', [SessionController::class, 'changePassword'])->name('password.changePassword');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/sesi/loggin', [SessionController::class, 'loggin'])->name('page.admin-dashboard');
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('page.admin-dashboard');

    // Routes for Aktivitas
    Route::get('/admin-aktivitas', [AktivitasController::class, 'index'])->name('aktivitas.index');
    Route::post('/admin-aktivitas', [AktivitasController::class, 'store'])->name('aktivitas.store');
    Route::get('/admin-aktivitas/{id}/edit', [AktivitasController::class, 'edit'])->name('aktivitas.edit');
    Route::put('/admin-aktivitas/{id}', [AktivitasController::class, 'update'])->name('aktivitas.update');
    Route::delete('/admin-aktivitas/{aktivitas}', [AktivitasController::class, 'destroy'])->name('aktivitas.destroy');

    // Routes for Artikel
    Route::get('/admin-artikel', [ArtikelController::class, 'index'])->name('artikels.index');
    Route::post('/admin-artikel', [ArtikelController::class, 'store'])->name('artikels.store');
    Route::get('/admin-artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikels.edit');
    Route::put('/admin-artikel/{id}', [ArtikelController::class, 'update'])->name('artikels.update');
    Route::delete('/admin-artikel/{artikels}', [ArtikelController::class, 'destroy'])->name('artikels.destroy');

    // Routes for User (Admin-User Management)
    Route::get('/admin-user', [UserController::class, 'index'])->name('user.index');
    Route::get('/admin-user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/admin-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/admin-user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/admin-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/admin-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});


//ADMIN
// Route::get('/admin-aktivitas', function () {
//     return view('page.admin-aktivitas');
// });
// Route::get('/admin-dashboard', function () {
//     return view('page.admin-dashboard');
// });
// Route::get('/admin-artikel', function () {
//     return view('page.admin-artikel');
// });
Route::get('/admin-daftarkegiatan', function () {
    return view('page.admin-daftarkegiatan');
});
Route::get('/admin-pencapaian', function () {
    return view('page.admin-pencapaian');
});
Route::get('/admin-user', function () {
    return view('page.admin-user');
});
