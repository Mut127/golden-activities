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
            <i class="fas fa-user-circle" style="font-size: 150px; color: #ccc;"></i> <!-- Ikon profil -->
            <div class="profile-buttons"> <!-- Tombol di bawah gambar -->
                <button class="btn-upload">Ubah Foto</button>
                <button class="btn-delete">Hapus Foto</button>
            </div>
        </div>
        <div class="profile-form"> <!-- Form profil -->
            <label for="email" class="bold-text">Email</label>
            <input type="email" id="email" value="kevin@gmail.com" class="purple-input">

            <label for="name" class="bold-text">Nama Lengkap</label>
            <input type="text" id="name" value="Kevin Sanjaya" class="purple-input">

            <label for="birthdate" class="bold-text">Tanggal Lahir</label>
            <input type="text" id="birthdate" value="10 Oktober 1977" class="purple-input">

            <label for="gender" class="bold-text">Jenis Kelamin</label>
            <input type="text" id="gender" value="Pria" class="purple-input">

            <label for="address" class="bold-text">Alamat</label>
            <input type="text" id="address" value="Jl. Sokayasa, 003/003, Purwokerto Selatan" class="purple-input">

            <label for="phone" class="bold-text">Nomor Telepon</label>
            <input type="text" id="phone" value="0812345678910" class="purple-input">

            <label for="password" class="bold-text">Password</label>
            <input type="password" id="password" value="******" class="purple-input">

            <button class="btn-edit-profile">Edit Profil</button>
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
