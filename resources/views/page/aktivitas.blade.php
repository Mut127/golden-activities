<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('title', 'Aktivitas')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Activities - Aktivitas</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        h3 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #2C2C2C;
            margin-bottom: 0.5rem;
            padding-bottom: 10px;
        }

        h4 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2C2C2C;
        }

        .aktivitas-section {
            padding-bottom: 0px;
        }

        .gambar-grid-section {
            margin-bottom: 20px;
        }

        .img-custom {
            width: 300px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #DEC8FE;
            color: #704FE6;
            border-color: #DEC8FE;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary i {
            margin-left: 8px;
        }

        .btn-primary:hover {
            background-color: #c5a8f0;
            color: #704FE6;
            border-color: #c5a8f0;
        }

        /* Tombol 'Cek Aktivitas Lainnya' */
        .btn-cek-aktivitas {
            background-color: #6E5FE2;
            color: white;
            border-color: #6E5FE2;
            padding: 10px 18px;
            border-radius: 50px;
            font-size: 0.9rem;
            align-items: center;
            margin-right: 50px;
            margin-bottom: 50px;
        }

        .btn-cek-aktivitas:hover {
            background-color: #563d7c;
            border-color: #563d7c;
        }

        .text-right {
            text-align: right;
        }

        .activities-section .text-right {
            display: flex;
            justify-content: flex-end;
            margin: 50px;
        }

        .aktivitas-section img {
            border-radius: 20px;
            max-width: 100%;
            height: 100px;
            width: 600px;
        }

        .aktivitas-section p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .center-text {
            text-align: justify;
        }

        .aktivitas-section .btn {
            margin-top: 1.5rem;
        }

        @media (max-width: 768px) {
            .aktivitas-section img {
                width: 100%;
                margin-bottom: 20px;
            }

            .aktivitas-section h3 {
                font-size: 1.3rem;
            }

            .aktivitas-section p {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.8rem;
            }
        }

        .activities-section .row>div {
            margin-bottom: 30px;
        }

        .activities-section .activity-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            margin-right: 5px;
            width: 270px;
            height: 350px;
            margin-top: 20px;
        }

        .activities-section .activity-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .activities-section .card-body {
            padding: 15px;
        }

        .activities-section .card-title {
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .activities-section .card-text {
            color: #666;
            font-size: 0.7rem;
        }

        .activities-section .card-date {
            padding-top: 0.3rem;
            font-size: 0.7rem;
            color: #666;
        }

        .activities-section .read-more {
            text-align: right;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .activities-section p {
            margin-top: -10px;
            margin-bottom: 1rem;
        }

        /* Mengatur tombol dropdown berwarna kuning */
        .dropdown .btn-warning {
            background-color: #FFC107;
            border-color: #FFC107;
            color: #000;
        }

        .dropdown .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }

        .dropdown-menu {
            background-color: #FFC107;
        }

        .dropdown-item {
            color: #000;
        }

        .dropdown-item:hover {
            background-color: #e0a800;
            color: #FFF;
        }

        /* Tambahan CSS untuk card */
        .card-footer {
            background-color: transparent;
            border-top: none;
            padding-top: 10px;
        }

        .love-btn {
            border: none;
            background-color: transparent;
            color: #6e5fe2;
            font-size: 1.5rem;
        }

        .love-btn:hover {
            color: #e74c3c;
        }

        .card-body .btn-primary {
            background-color: #DEC8FE;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 0.8rem;
            color: #704FE6;
            border-color: #DEC8FE;
        }

        .card-body .btn-primary i {
            margin-left: 5px;
        }

        .activity-card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .activity-card img {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
</head>

<body>
    <!-- Aktivitas Section -->
    <section class="aktivitas-section">
        <div class="container">
            <h2 class="font-weight-bold mb-2">Aktivitas</h2>
            <p class="center-text mb-3">Ayo ikuti berbagai aktivitas yang menarik dan seru!</p>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/your-video-id" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>Yoga untuk Lansia: Menjaga Kesehatan Tubuh dan Pikiran di Usia Emas</h4>
                    <p class="center-text">Yoga telah lama dikenal sebagai aktivitas yang menggabungkan latihan fisik, pernapasan, dan meditasi untuk menjaga keseimbangan tubuh dan pikiran. Namun, tidak hanya untuk orang muda, yoga juga sangat bermanfaat bagi lansia. Dengan gerakan yang lembut dan terkontrol, yoga dapat membantu menjaga fleksibilitas, keseimbangan, serta kesehatan mental pada usia lanjut.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gambar Grid Section -->
    <section class="gambar-grid-section py-lg-3">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <img src="person1.jpg" class="img-fluid img-custom" alt="Gambar 1">
                </div>
                <div class="col-md-3">
                    <img src="person2.jpg" class="img-fluid img-custom" alt="Gambar 2">
                </div>
                <div class="col-md-3">
                    <img src="person3.jpg" class="img-fluid img-custom" alt="Gambar 3">
                </div>
                <div class="col-md-3">
                    <img src="person4.jpg" class="img-fluid img-custom" alt="Gambar 4">
                </div>
            </div>
        </div>
    </section>

    <!-- Aktivitas Terbaru Section -->
    <section class="activities-section">
        <div class="container">
            <h3 class="font-weight-bold mb-1">Segera <span class="text-primary">Daftar</span></h3>
            <p class="mb-2">Tunggu apa lagi? segera daftar dan dapatkan tiketnya!</p>
            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Jenis Aktivitas
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Online</a>
                    <a class="dropdown-item" href="#">Offline</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="activity-card">
                        <img src="aktivitas.png" alt="Aktivitas 1">
                        <div class="card-body">
                            <h5 class="card-title">Kerajinan Tangan</h5>
                            <p class="card-date"><i class="far fa-clock"></i> 09.00 - 11.30</p>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> Caffe Ejji</p>
                            <a href="#" class="btn btn-primary">Daftar Sekarang <i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn love-btn"><i class="fas fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan card lainnya di sini -->
            </div>
        </div>
    </section>

    <!-- Tombol 'Cek Aktivitas Lainnya' -->
    <div class="text-right mt-4">
        <a href="#" class="btn btn-cek-aktivitas">Cek Aktivitas Lainnya <i class="fas fa-arrow-down"></i></a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

</html>