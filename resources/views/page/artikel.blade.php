<!DOCTYPE html>
<html lang="en">
@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Golden Activities - Artikel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            /* Membuat ukuran teks menjadi lebih besar */
            font-weight: bold;
            color: #2C2C2C;
        }

        h4 {
            font-size: 1.5rem;
            /* Ukuran teks judul dikurangi */
            font-weight: bold;
            color: #2C2C2C;
        }

        .btn-primary {
            background-color: #6e5fe2;
            border-color: #6e5fe2;
            padding: 10px 18px;
            border-radius: 50px;
            /* Membuat sudut tombol menjadi bulat */
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
        }

        .btn-primary i {
            margin-left: 8px;
            /* Memberi jarak antara teks dan ikon */
        }

        .btn-primary:hover {
            background-color: #563d7c;
            border-color: #563d7c;
        }

        .text-right {
            text-align: right;
        }

        .articles-section .text-right {
            display: flex;
            justify-content: flex-end;
            margin: 50px;
        }

        /* Mengatur gambar artikel di sebelah kiri */
        .artikel-section img {
            border-radius: 20px;
            /* Membuat gambar memiliki sudut melengkung */
            max-width: 100%;
            /* Membatasi ukuran gambar maksimal 100% dari kontainer */
            height: 100px;
            /* Menjaga proporsi gambar */
            width: 600px;
        }

        .artikel-section p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .center-text {
            text-align: justify;
            /* Membuat teks rata tengah */
        }

        .artikel-section .btn {
            margin-top: 1.5rem;
        }

        @media (max-width: 768px) {
            .artikel-section img {
                width: 100%;
                margin-bottom: 20px;
            }

            .artikel-section h3 {
                font-size: 1.3rem;
                /* Ukuran teks judul lebih kecil untuk layar kecil */
            }

            .artikel-section p {
                font-size: 0.9rem;
            }

            .btn {
                font-size: 0.8rem;
                /* Ukuran teks pada tombol dikurangi untuk layar kecil */
            }
        }

        .articles-section .row>div {
            margin-bottom: 30px;
            /* Memberikan jarak antar kartu artikel secara vertikal */
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
            margin-bottom: 20px;
        }

        .articles-section .card-text {
            color: #666;
            font-size: 0.7rem;
        }

        .articles-section .card-date {
            padding-top: 0.3rem;
            font-size: 0.7rem;
            color: #666;
        }

        .articles-section .read-more {
            text-align: right;
            font-size: 0.7rem;
            font-weight: bold;
        }

        /* Mengurangi jarak antara h2 dan paragraf deskripsi */
        .articles-section p {
            margin-top: -10px;
            /* Mengurangi jarak antara kalimat */
        }

        /* Ukuran gambar yoga untuk lansia */
        .artikel-section .img-fluid {
            height: 100%;
            /* Memastikan gambar memenuhi tinggi div-nya */
            object-fit: cover;
            /* Mengatur gambar tetap proporsional */
        }
    </style>
</head>

<body>
    <!-- Artikel Section -->
    <section class="artikel-section py-5">
        <div class="container">
            <h2 class="font-weight-bold mb-4">Artikel</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="person1.jpg" class="img-fluid rounded" alt="Yoga untuk Lansia">
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
            <p class="mb-3">Aktivitas apa saja sih yang baru-baru ini dilakukan?</p> <!-- Mengurangi margin bottom dari 5 ke 3 -->
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

        <div class="text-right mt-4">
            <a href="#" class="btn btn-primary">Cek Artikel Lainnya <i class="fas fa-arrow-down"></i></a>
        </div>
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection

</html>