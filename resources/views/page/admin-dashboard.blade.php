<!DOCTYPE html>
<html lang="en">
@extends('layouts.app-admin')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        margin-left: 250px;
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

    /* Menambahkan CSS untuk membuat teks justify */
    .justified-text {
        text-align: justify;
        padding-left: 10px;
    }
    /* Kelas untuk mengatur ukuran gambar */
    .custom-image {
        width: 700px; /* Sesuaikan ukuran lebar gambar */
        height: 300px; /* Agar tinggi mengikuti proporsi lebar */
        max-width: 100%; /* Agar tetap responsif */
    }
</style>
<body>

<!-- Main Content -->
<div class="content">
    <div class="dashboard-header">
        <div>
            <h2>Dashboard</h2>
            <h4>Selamat Datang, {{ Auth::user()->name }}!</h4> <!-- Menampilkan nama pengguna yang login -->
        </div>
        <div class="user-info">
            <span>{{ Auth::user()->name }}</span> <!-- Nama pengguna yang login -->
            <span>{{ Auth::user()->usertype }}</span> <!-- Menampilkan peran/admin/user -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-yellow">
                <div>Total Aktivitas</div>
                <h1>{{ $totalAktivitas }}</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-purple">
                <div>Total Artikel</div>
                <h1>{{ $totalArtikel }}</h1>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-blue">
                <div>Total User</div>
                <h1>{{ $totalUser }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('images/dash.png') }}" alt="Logo" class="custom-image"> <!-- Gunakan kelas custom untuk gambar -->
        </div>
        <div class="col-md-6 custom-text">
            <p class="justified-text">
                Lansia sering kali mengalami keterbatasan dalam beraktivitas sosial dan menjaga kebugaran fisik. Menurut penelitian, aktivitas sosial dan kebugaran sangat penting dalam meningkatkan kualitas hidup lansia, baik dari segi fisik, mental, maupun emosional. Di era digital saat ini, aplikasi mobile menjadi solusi praktis untuk memfasilitasi kegiatan tersebut.
                Golden Activities hadir sebagai platform digital yang menyediakan akses mudah bagi lansia untuk terlibat dalam aktivitas sosial dan program kebugaran yang sesuai dengan kondisi mereka. Seperti yang pernah dikatakan oleh George Burns, "You can't help getting older, but you don't have to get old." Golden Activities bertujuan membantu lansia merasakan masa tua yang tetap aktif dan bermakna.
            </p>
        </div>
    </div>
</div>
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
@endsection
</html>
