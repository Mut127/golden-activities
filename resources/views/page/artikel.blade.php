<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('title', 'Artikel')

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
    <link href="{{ asset('css/artikel.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Artikel Section -->
    <section class="artikel-section py-5">
        <div class="container">
            <h2 class="font-weight-bold mb-2">Artikel</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('images/person1.jpg') }}" class="img-fluid rounded" alt="Yoga untuk Lansia">
                </div>
                <div class="col-md-6">
                    <h4>Yoga untuk Lansia: Menjaga Kesehatan Tubuh dan Pikiran di Usia Emas</h4>
                    <p class="center-text">Yoga telah lama dikenal sebagai aktivitas yang menggabungkan latihan fisik, pernapasan, dan meditasi untuk menjaga keseimbangan tubuh dan pikiran. Namun, tidak hanya untuk orang muda, yoga juga sangat bermanfaat bagi lansia. Dengan gerakan yang lembut dan terkontrol, yoga dapat membantu menjaga fleksibilitas, keseimbangan, serta kesehatan mental pada usia lanjut.</p>
                    <a href="#" class="btn btn-primary">Baca Selengkapnya <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Artikel Terbaru Section -->
    <!-- Articles Section -->
    <section class="articles-section">
        <div class="container">
            <h3 class="font-weight-bold mb-4">Artikel <span class="text-primary">Terbaru</span></h3>
            <p class="mb-3">Aktivitas apa saja sih yang baru-baru ini dilakukan?</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="article-card">
                        <img src="{{ asset('images/artikel.jpg') }}" alt="Artikel 1">
                        <div class="card-body">
                            <p class="card-date">13 December 2023</p>
                            <h5 class="card-title">Aktivitas Pertemuan Kopi & Cerita</h5>
                            <p class="card-text">By Admin SmkNs</p>
                            <div class="read-more">
                                <a href="{{ route('detailartikel', ['id' => 1]) }}">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="article-card">
                        <img src="{{ asset('images/artikel.jpg') }}" alt="Artikel 2">
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
                        <img src="{{ asset('images/artikel.jpg') }}" alt="Artikel 3">
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
                        <img src="{{ asset('images/artikel.jpg') }}" alt="Artikel 4">
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

        <div class="text-right mt-4">
            <a href="#" class="btn btn-primary">Cek Artikel Lainnya <i class="fas fa-arrow-down"></i></a>
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

</html>
