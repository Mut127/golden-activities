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
    <link href="{{ asset('css/reward.css') }}" rel="stylesheet">
</head>

<body>

<!-- Konten Reward -->
<div class="reward-container">
    <h1>Pencapaian</h1>
    <p class="reward-subtitle">Lakukan 5 kegiatan dan dapatkan hadiah...</p>

    <div class="reward-box">
        <p class="reward-text">Telah Mengikuti Aktivitas: <strong>Lokakarya Berkebun di Baturraden</strong> pada tanggal <strong>17 September 2024</strong></p>
    </div>

    <p class="reward-congratulations">Selamat Anda telah melakukan 5 kegiatan, terima hadiah?</p>

    <button class="btn-redeem">
        <i class="fas fa-gift"></i> Terima Hadiah
    </button>
</div>
</body>
@endsection
</html>
