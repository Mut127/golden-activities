<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome untuk ikon -->
    <style>
        /* Reset CSS untuk menghilangkan margin dan padding default */
        html, body {
            margin: 0; /* Hilangkan margin default */
            padding: 0; /* Hilangkan padding default */
            width: 100%; /* Pastikan body menggunakan 100% lebar */
            overflow-x: hidden; /* Mencegah scroll horizontal */
        }

        * {
            box-sizing: border-box; /* Terapkan box-sizing ke semua elemen */
        }

        /* Navbar Styles */
        .navbar {
            background-color: #fff; /* Warna latar belakang navbar */
            padding: 1rem 2rem; /* Padding atas-bawah dan kiri-kanan */
            display: flex; /* Menggunakan flexbox untuk tata letak */
            justify-content: space-between; /* Jarak antara logo, menu, dan ikon pengguna */
            align-items: center; /* Memastikan item di tengah */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan di bawah navbar */
            width: 100%; /* Lebar 100% dari layar */
            position: relative; /* Agar elemen bisa ditumpuk dengan benar */
            left: 0; /* Mengatur posisi ke kiri */
            right: 0; /* Mengatur posisi ke kanan */
        }

        /* Logo */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 1rem; /* Jarak antara logo dan teks */
        }

        .navbar-logo img {
            height: 60px; /* Ukuran logo diperbesar */
            width: auto; /* Memastikan lebar otomatis */
        }

        /* Menu Navbar */
        .navbar-menu {
            list-style: none; /* Menghilangkan bullet point dari list */
            display: flex; /* Menggunakan flexbox untuk list */
            gap: 2rem; /* Jarak antar link */
        }

        .navbar-menu li {
            display: inline; /* Menjaga item tetap dalam satu baris */
        }

        .navbar-menu li a {
            text-decoration: none; /* Menghilangkan garis bawah */
            color: #333; /* Warna teks link */
            font-weight: 500; /* Menebalkan font */
        }

        .navbar-menu li a:hover {
            color: #6e5fe2; /* Warna saat hover */
        }

        /* Ikon Pengguna */
        .navbar-user {
            display: flex; /* Menggunakan flexbox untuk ikon */
            align-items: center; /* Memastikan ikon tetap sejajar */
        }

        .navbar-user i {
            font-size: 40px; /* Ukuran ikon 40px */
            color: #333; /* Warna ikon */
        }
    </style>
    <title>Navbar Example</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="{{ asset('images/logo_GA.PNG') }}" alt="Golden Activities Logo"> <!-- Ganti dengan logo yang tersedia -->
        </div>
        <ul class="navbar-menu">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Aktivitas</a></li>
            <li><a href="#" class="active">Daftar Aktivitas</a></li>
            <li><a href="#">Pencapaian</a></li>
            <li><a href="#">Artikel</a></li>
        </ul>
        <div class="navbar-user">
            <i class="fas fa-user-circle"></i> <!-- Ikon profil dari Font Awesome -->
        </div>
    </nav>

</body>
</html>
