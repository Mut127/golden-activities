<!DOCTYPE html>
<html lang="en">
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
    <link href="{{ asset('css/aktivitas.css') }}" rel="stylesheet">
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
                    <img src="{{ asset('images/person1.jpg') }}" class="img-fluid img-custom" alt="Gambar 1">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/person2.jpg') }}" class="img-fluid img-custom" alt="Gambar 2">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/person3.jpg') }}" class="img-fluid img-custom" alt="Gambar 3">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('images/person4.jpg') }}" class="img-fluid img-custom" alt="Gambar 4">
                </div>
            </div>
        </div>
    </section>

    <!-- Aktivitas Terbaru Section -->
    <section class="activities-section">
        <div class="container">
            <h3 class="font-weight-bold mb-1">Lihat Aktivitas</h3>
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
                        <img src="{{ asset('images/aktivitas.png') }}" alt="Aktivitas 1">
                        <div class="card-body">
                            <h5 class="card-title">Kerajinan Tangan</h5>
                            <p class="card-date"><i class="far fa-clock"></i> 09.00 - 11.30</p>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> Caffe Ejji</p>
                            <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar Sekarang <i class="fas fa-arrow-right"></i></a>
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
