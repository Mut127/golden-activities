<!DOCTYPE html>
<html lang="en">
    @extends('layouts.app-admin')
    @section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List - BahteraKarsa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
            position: fixed;
            width: 250px;
        }

    .content {
            margin-left: 250px; /* Align next to the sidebar */
            padding: 20px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-info {
            text-align: right;
        }

        .user-info span {
            display: block;
        }

        .card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
            font-weight: bold;
        }

        .card-yellow {
            background-color: #FFC107;
        }

        .card-purple {
            background-color: #D1C4E9;
        }

        .card-blue {
            background-color: #64B5F6;
        }
</style>
<body>

<!-- Main Content -->
<div class="content">
    <div class="dashboard-header">
        <div>
            <h2>Dashboard</h2>
            <h4>Selamat Datang, Pimpinan!</h4>
        </div>
        <div class="user-info">
            <span>Mutia Nandhika</span>
            <span>Pimpinan</span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-yellow">
                <div>Total Event</div>
                <h1>5</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-purple">
                <div>Total Pendaftar</div>
                <h1>1</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-blue">
                <div>Total Pengumuman</div>
                <h1>5</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/person1.jpg') }}" alt="Logo" class="img-fluid">
        </div>
        <div class="col-md-6">
            <p>
                Terima kasih tak terhingga kami sampaikan kepada seluruh mahasiswa dan pengurus BEM yang telah dengan sukarela dan penuh semangat membantu dalam mewujudkan <strong>Sistem Informasi Open Recruitment BEM 2024</strong>. Kerjasama dan dedikasi Anda semua adalah fondasi utama dalam menghadirkan sumber informasi yang berharga ini bagi seluruh mahasiswa.
            </p>
            <p>
                Sistem ini bukan hanya sebuah sarana untuk mendapatkan informasi, tetapi juga cerminan dari semangat kebersamaan dan kolaborasi yang begitu kuat di lingkungan kampus.
            </p>
            <p>Terima kasih sekali lagi untuk semua kontribusi berharga Anda.</p>
        </div>
    </div>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
@endsection
</html>
