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
    <link href="{{ asset('css/beranda.css') }}" rel="stylesheet">
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
                    <img src="{{ asset('images/beranda.jpg') }}" alt="Golden Activities" class="hero-image">
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
                        <img src="{{ asset('images/kuis1.jpg') }}" class="card-img-top" alt="Quiz 1">
                        <div class="card-body">
                            <h5 class="card-title">Fun <span>Quiz</span></h5>
                            <p class="card-text">Yuk, ikuti Kuis Seru ini dan uji pengetahuan kamu sambil bersenang-senang!</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/kuis2.jpg') }}" class="card-img-top" alt="Quiz 2">
                        <div class="card-body">
                            <h5 class="card-title">Fun <span>Quiz</span></h5>
                            <p class="card-text">Yuk, ikuti Kuis Seru ini dan uji pengetahuan kamu sambil bersenang-senang!</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('images/kuis3.jpg') }}" class="card-img-top" alt="Quiz 3">
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
                        <img src="{{ asset('images/person1.jpg') }}" alt="User 1">
                    </div>
                </div>
                <!-- Leader Card 2 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="{{ asset('images/person2.jpg') }}" alt="User 2">
                    </div>
                </div>
                <!-- Leader Card 3 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="{{ asset('images/person3.jpg') }}" alt="User 3">
                    </div>
                </div>
                <!-- Leader Card 4 -->
                <div class="col-md-3">
                    <div class="card">
                        <h5>Belle Key</h5>
                        <p>25 aktivitas</p>
                        <img src="{{ asset('images/person4.jpg') }}" alt="User 4">
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
                        <img src="{{ asset('images/yoga.jpg') }}" alt="Yoga Santai di Taman">
                        <div class="activity-overlay">
                            <h5 class="activity-title">Yoga Santai di Taman</h5>
                            <p class="activity-location">Taman Andhang Pangrenan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-card">
                        <img src="{{ asset('images/yoga.jpg') }}" alt="Klub Buku Lansia">
                        <div class="activity-overlay">
                            <h5 class="activity-title">Klub Buku Lansia</h5>
                            <p class="activity-location">Perpustakaan Daerah Banyumas</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="activity-card">
                        <img src="{{ asset('images/yoga.jpg') }}" alt="Kelas Melukis Lansia">
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
            @if($latestArtikels->count() > 0)
            <div class="row ustify-content-start">
                @foreach ($latestArtikels as $artikel)
                @php
                $plainContent = strip_tags($artikel->content);
                $limitedContent = Str::limit($plainContent, 100);
                @endphp
                <div class="col-md-3">
                    <div class="article-card">

                        <img src="{{ asset('storage/' . $artikel->image_path) }}" class="card-img-top img-fluid uniform-img-size" alt="Article">

                        <div class="card-body">
                            <p class="card-date">{{ $artikel->created_at->format('d-m-Y') }}</p>
                            <h5 class="card-title">{{ Str::limit($artikel->judul, 30) }}</h5>
                            <p class="card-text"> {{ $artikel->user->name }}</p>
                            <a href="{{ route('artikels.show', $artikel->id) }}" class="btn-more">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center my-5">
                <h2 class="display-2" style="font-weight: bold; color:#9E9E9E">Tidak ada artikel</h2>
                <p class="lead">Belum ada artikel yang tersedia saat ini.</p>
            </div>
            @endif
            @if($latestArtikels->count() > 0)
            <div class="text-center mt-3">
                <a href="{{ url('/artikel') }}" class="tittleAD">Lihat Artikel Lainnya ></a>
            </div>
            @else
            <div class="text-center mt-3"></div>
            @endif
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