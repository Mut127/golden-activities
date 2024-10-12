<!DOCTYPE html>
<html lang="id">
@extends('layouts.app')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Activities</title>
    <!-- Link Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Konten Profil -->
    <div class="profile-container">
        <!-- Tombol Kembali -->
        <a href="javascript:history.back()" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <h1 class="profile-title">Profil</h1> <!-- Judul Profil -->
        <div class="profile-content">
            <div class="profile-image">

                @if(auth()->user()->profile_image)

                <img src="{{ Storage::url( auth()->user()->profile_image) }}" alt="Profile Photo" class="img-fluid">
                @else
                <i class="fas fa-user-circle" style="font-size: 150px; color: #ccc;"></i> <!-- Ikon profil -->
                @endif

                <div class="profile-buttons"> <!-- Tombol di bawah gambar -->
                    <button class="btn-upload">Ubah Foto</button>
                    <button class="btn-delete">Hapus Foto</button>
                </div>
            </div>
            <div class="profile-form">

                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label for="email" class="bold-text">Email</label>
                    <input type="email" id="email" class="purple-input" value="{{ auth()->user()->email }}" disabled>

                    <label for="name" class="bold-text">Nama Lengkap</label>
                    <input type="text" id="name" class="purple-input" name="name" value="{{ auth()->user()->name }}">

                    @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                    <label for="phone" class="bold-text">Nomor Telepon</label>
                    <input type="text" id="phone" class="purple-input" name="number" value="{{ auth()->user()->number }}">
                    @if ($errors->has('number'))
                    <div class="text-danger">{{ $errors->first('number') }}</div>
                    @endif
                    <label for="password" class="bold-text">Password (Kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" class="purple-input" id="password" name="password" value="{{ auth()->user()->password }}">

                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="purple-input" id="password_confirmation" name="password_confirmation">
                    <button class="btn-edit-profile">Edit Profil</button>
                </form>
            </div>
        </div>
    </div>

    @endsection
    <script>
        document.querySelector(".btn-upload").addEventListener("click", function() {
            alert("Foto telah diubah!");
        });

        document.querySelector(".btn-delete").addEventListener("click", function() {
            alert("Foto telah dihapus!");
        });

        document.querySelector(".btn-edit-profile").addEventListener("click", function() {
            alert("Profil berhasil diedit!");
        });
    </script>
    <!-- JavaScript untuk Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>