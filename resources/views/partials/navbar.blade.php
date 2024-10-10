<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome untuk ikon -->
    <style>
        /* Reset CSS untuk menghilangkan margin dan padding default */
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }

        * {
            box-sizing: border-box;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #fff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 70px;
            margin-top: 20px;
        }

        /* Logo */
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-logo img {
            height: 60px;
            width: auto;
        }

        /* Menu Navbar */
        .navbar-menu {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex: 1;
            font-size: 0.9rem;
            color: black;
        }

        .navbar-menu li {
            display: inline;
        }

        .navbar-menu li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .navbar-menu li a:hover {
            color: #6e5fe2;
        }

        /* Ikon Pengguna */
        .navbar-user {
            position: relative;
            margin-right: 100px;
        }

        .navbar-user img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }
        .navbar-menu li a.active {
    color: #6e5fe2; /* Warna ungu */
    font-weight: bold; /* Teks menjadi tebal */
}
        /* Dropdown Menu */
        .navbar-user .dropdown-menu {
            display: none;
            position: absolute;
            left: 0;
            top: 50px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1000;
            width: 120px;
        }

        .navbar-user .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
        }

        .navbar-user .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }

        /* Show dropdown when active */
        .navbar-user.active .dropdown-menu {
            display: block;
        }
    </style>
    <title>Navbar Example</title>
</head>

<body>

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="{{ asset('images/logo_GA.PNG') }}" alt="Golden Activities Logo"> <!-- Ganti dengan logo yang tersedia -->
        </div>
        <ul class="navbar-menu">
            <li><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
            <li><a class="nav-link {{ Request::is('/aktivitas') ? 'active' : '' }}" href="{{ url('/aktivitas') }}">Aktivitas</a></li>
            <li><a class="nav-link {{ Request::is('/todolist') ? 'active' : '' }}" href="{{ url('/todolist') }}">Daftar Aktivitas</a></li>
            <li><a class="nav-link {{ Request::is('/reward') ? 'active' : '' }}" href="{{ url('/reward') }}">Pencapaian</a></li>
            <li><a class="nav-link {{ Request::is('/artikel') ? 'active' : '' }}" href="{{ url('/artikel') }}">Artikel</a></li>
        </ul>
        <div class="navbar-user" id="navbarUser">
            <img src="{{ asset('images/person2.jpg') }}" alt="Profil Pengguna"> <!-- Ganti ikon profil dengan gambar pengguna -->
            <div class="dropdown-menu">
                <a href="{{ route('profile') }}">Edit Profil</a>
                <a href="#">Logout</a>
            </div>
        </div>
    </nav>
    <!-- JavaScript untuk Dropdown -->
    <script>
        // Menampilkan dropdown saat pengguna mengklik profil
        document.getElementById('navbarUser').addEventListener('click', function (event) {
            this.classList.toggle('active');
            event.stopPropagation(); // Mencegah event click diteruskan ke document
        });

        // Menutup dropdown saat pengguna mengklik di luar dropdown
        document.addEventListener('click', function (event) {
            var dropdown = document.querySelector('.navbar-user');
            if (dropdown.classList.contains('active')) {
                dropdown.classList.remove('active');
            }
        });

        // Mencegah penutupan dropdown saat mengklik dalam menu dropdown
        document.querySelector('.dropdown-menu').addEventListener('click', function (event) {
            event.stopPropagation();
        });
    </script>

</body>

</html>
