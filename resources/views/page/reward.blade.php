@extends('layouts.app')

@section('title', 'Reward')

@section('content')

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


@endsection