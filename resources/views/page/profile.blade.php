@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<!-- Konten Profil -->
<div class="profile-container">
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
</body>

</html>