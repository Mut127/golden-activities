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

    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFF;
        }

        /* Hero Section */
        .hero-section {
            padding: 20px 0;
            background-color: #FFFF;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #2C2C2C;
        }

        .hero-section p {
            font-size: 0.80rem;
            font-weight: medium;
            line-height: 1.7;
            color: #000000;
            text-align: justify;
        }

        .hero-section .btn {
            background-color: #6c5ce7;
            color: #fff;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
        }

        .hero-section .btn i {
            margin-left: 10px;
        }

        .hero-section .btn:hover {
            background-color: #5b4dc0;
        }

        .hero-image {
            width: 100%;
            border-radius: 20px;
        }

        /* Interactive Features Section */
        .interactive-section {
            padding: 60px 0;
        }

        .interactive-section h3 {
            font-size: 2.5rem;
            color: #000;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .interactive-section h3 span {
            color: #6c5ce7;
            font-style: italic;
        }

        .interactive-section .card {
            border: none;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .interactive-section .card:hover {
            transform: translateY(-10px);
        }

        .interactive-section .card img {
            border-radius: 15px 15px 0 0;
            height: 200px; /* Atur tinggi gambar sesuai keinginan */
            object-fit: cover; /* Memastikan gambar tetap proporsional dan terpotong jika perlu */
        }

        .interactive-section .card-title {
            font-weight: bold;
            color: #000;
        }

        .interactive-section .card-title span {
            color: #6c5ce7;
        }

        .interactive-section .card-text {
            font-size: 0.9rem;
            color: #666;
        }

        /* Leaderboard Section */
        .leaderboard-section {
            background-color: #fff;
            padding-top: 10px 0; /* Menambahkan padding atas dan bawah */
        }

        .leaderboard-section h2 {
            font-size: 1.2rem; /* Ukuran lebih kecil */
            font-weight: bold;
            text-align: center;
            margin-bottom: 60px;
            color: #6c5ce7; /* Warna sesuai dengan gambar */
        }

        .leaderboard-section .card {
            background-color: #e0c6f1;
            border-radius: 50px;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
            height: 370px; /* Menjaga tinggi kartu */
            width: 220px;
            display: inline-block; /* Agar gambar dan teks berada di tengah */
        }

        .leaderboard-section .card img {
            width: 200px; /* Mengubah ukuran gambar untuk memenuhi lebar kartu */
            height: 250px; /* Menjaga tinggi gambar seragam */
            border-radius: 10px; /* Membuat sudut gambar melengkung */
            object-fit: cover; /* Memastikan gambar tetap proporsional dan terpotong jika perlu */
            margin: 10px 0;
        }

        .leaderboard-section .card h5 {
            margin: 10px 0 5px 0; /* Jarak antara nama dan aktivitas */
        }

        .leaderboard-section .card p {
            margin: 5px 0; /* Jarak antara aktivitas */
            font-weight: bold; /* Menjadikan teks aktivitas lebih tebal */
        }

        /* Documentation Section */
        .documentation-section {
            padding: 60px 0;
            background-color: #E5C6F1; /* Warna latar belakang */
            margin-top: 60px;
        }

        .documentation-section .container {
            display: flex;
            justify-content: space-between; /* Mengatur konten agar berada di kiri dan kanan */
            align-items: center;
        }

        .documentation-section h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #000;
            margin-bottom: 40px;
            max-width: 50%; /* Membatasi lebar judul */
        }

        .documentation-section .divider {
            width: 150px;
            height: 4px;
            background-color: #6c5ce7;
            margin: 40px;
        }

        .documentation-section .activity-card {
            position: relative;
            overflow: hidden;
        }

        .documentation-section .activity-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .documentation-section .activity-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 5px;
            background-color: rgba(255, 255, 255, 0.8); /* Warna transparan */
            text-align: center;
        }

        .documentation-section .activity-title {
            font-weight: bold;
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .documentation-section .activity-location {
            font-size: 0.8rem;
            color: #000000;
        }

        /* Articles Section */
        .articles-section {
            padding: 60px 0;
        }

        .articles-section h2 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
        }

        .articles-section .article-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-right: 5px;
            width: 270px;
            height: 350px;
        }

        .articles-section .article-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .articles-section .card-body {
            padding: 15px;
        }

        .articles-section .card-title {
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .articles-section .card-text {
            color: #666;
            font-size: 0.7rem;
        }

        .articles-section .card-date {
            font-size: 0.7rem;
            color: #704FE6;
        }

        .articles-section .read-more {
            text-align: right;
            font-size: 0.7rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .documentation-section h2 {
                font-size: 2rem;
            }

            .articles-section h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Golden <span style="color: #6c5ce7;">Activities</span></h1>
                    <p>
                        Ayo bergabung dengan Golden Activities, aplikasi yang dirancang khusus untuk memudahkan lansia tetap aktif dan terhubung! Temukan berbagai kegiatan mulai dari kebugaran ringan, klub sosial, hingga lokakarya hobi, dan atur jadwal pribadi Anda dengan mudah melalui daftar kegiatan interaktif. Nikmati akses ke kelas virtual dan dapatkan rekomendasi kegiatan sesuai minat serta kondisi kesehatan. Plus, kumpulkan poin dan badge setiap kali berpartisipasi! Bantu orang tua atau diri Anda sendiri tetap aktif dan sehat, kapan saja, di mana saja. Yuk, daftar sekarang!
                    </p>
                    <a href="#" class="btn btn-primary">Get Started <i class="fas fa-angle-right" style="margin-left: 8px;"></i></a>
                </div>
                <div class="col-md-6">
                    <img src="beranda.jpg" alt="Golden Activities" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Features Section -->
    <section class="interactive-section text-center">
        <div class="container">
            <h3>Our <span>Interactive</span> Features</h3>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="kuis1.jpg" class="card-img-top" alt="Quiz 1">
                        <div class="card-body">
                            <h5 class="card-title">Fun <span>Quiz</span></h5>
                            <p class="card-text">Yuk, ikuti Kuis Seru ini dan uji pengetahuan kamu sambil bersenang-senang!</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="kuis2.jpg" class="card-img-top" alt="Quiz 2">
                        <div class="card-body">
                            <h5 class="card-title">Fun <span>Quiz</span></h5>
                            <p class="card-text">Yuk, ikuti Kuis Seru ini dan uji pengetahuan kamu sambil bersenang-senang!</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="kuis3.jpg" class="card-img-top" alt="Quiz 3">
                        <div class="card-body">
                            <h5 class="card-title">Fun <span>Quiz</span></h5>
                            <p class="card-text">Yuk, ikuti Kuis Seru ini dan uji pengetahuan kamu sambil bersenang-senang!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leaderboard Section -->
    <section class="leaderboard-section text-center">
        <div class="container">
            <h2>Tantang diri <span style="color: black;">kamu</span>, kumpulkan <span style="color: black;">poin</span>, <br> dan lihat apakah <span style="color: black;">kamu</span> bisa menjadi juaranya</h2>
            <div class="row">
                <!-- Leader Card 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="person1.jpg" alt="User 1">
                    </div>
                </div>
                <!-- Leader Card 2 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="person2.jpg" alt="User 2">
                    </div>
                </div>
                <!-- Leader Card 3 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="person3.jpg" alt="User 3">
                    </div>
                </div>
                <!-- Leader Card 4 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="person4.jpg" alt="User 4">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Documentation Section -->
    <section class="documentation-section">
        <div class="container">
            <h3>Dokumentasi Aktivitas Golden Activities</h3>
            <div class="divider"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="activity-card">
                        <img src="yoga.jpg" alt="Yoga Santai di Taman">
                        <div class="activity-overlay">
                            <h5 class="activity-title">Yoga Santai di Taman</h5>
                            <p class="activity-location">Taman Andhang Pangrenan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-card">
                        <img src="yoga.jpg" alt="Klub Buku Lansia">
                        <div class="activity-overlay">
                            <h5 class="activity-title">Klub Buku Lansia</h5>
                            <p class="activity-location">Perpustakaan Daerah Banyumas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-card">
                        <img src="yoga.jpg" alt="Kelas Melukis Lansia">
                        <div class="activity-overlay">
                            <h5 class="activity-title">Kelas Melukis Lansia</h5>
                            <p class="activity-location">Caffe Eiji Purwokerto Timur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="articles-section">
        <div class="container">
            <h2>Artikel <span style="color: #6c5ce7;"> <br> Golden Activities</span></h2>
            <p style="text-align: center; padding-bottom: 20px;">Aktivitas apa saja sih yang sudah pernah dilakukan?</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="article-card">
                        <img src="artikel.jpg" alt="Artikel 1">
                        <div class="card-body">
                            <p class="card-date">13 December 2023</p>
                            <h5 class="card-title">Aktivitas Pertemuan Kopi & Cerita</h5>
                            <p class="card-text">By Admin SmkNs</p>
                            <div class="read-more"><a href="#">Baca Selengkapnya</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article-card">
                        <img src="artikel.jpg" alt="Artikel 2">
                        <div class="card-body">
                            <p class="card-date">13 December 2023</p>
                            <h5 class="card-title">Aktivitas Pertemuan Kopi & Cerita</h5>
                            <p class="card-text">By Admin SmkNs</p>
                            <div class="read-more"><a href="#">Baca Selengkapnya</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article-card">
                        <img src="artikel.jpg" alt="Artikel 3">
                        <div class="card-body">
                            <p class="card-date">13 December 2023</p>
                            <h5 class="card-title">Aktivitas Pertemuan Kopi & Cerita</h5>
                            <p class="card-text">By Admin SmkNs</p>
                            <div class="read-more"><a href="#">Baca Selengkapnya</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article-card">
                        <img src="artikel.jpg" alt="Artikel 4">
                        <div class="card-body">
                            <p class="card-date">13 December 2023</p>
                            <h5 class="card-title">Aktivitas Pertemuan Kopi & Cerita</h5>
                            <p class="card-text">By Admin SmkNs</p>
                            <div class="read-more"><a href="#">Baca Selengkapnya</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript untuk Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
@endsection
</html>
