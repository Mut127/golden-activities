@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

<div>
    <article>
        <h1>Yoga untuk Lansia: Menjaga Kesehatan Tubuh dan Pikiran di Usia Emas</h1>
        <p>by Admin GASatu | 05 Oktober 2024</p>

        <div class="icon-container">
            <i class="fas fa-image"></i>
        </div>

        <p>
            Yoga telah lama dikenal sebagai aktivitas yang menggabungkan latihan fisik, pernapasan, dan meditasi untuk menjaga keseimbangan tubuh dan pikiran...
        </p>
        <h2>Mengapa Yoga Penting bagi Lansia?</h2>
        <p>Seiring bertambahnya usia, tubuh mengalami berbagai perubahan...</p>
        <h2>Manfaat Yoga bagi Lansia</h2>
        <p>Meningkatkan Fleksibilitas Seiring bertambahnya usia, fleksibilitas tubuh biasanya berkurang...</p>
    </article>
</div>

@endsection

<!-- Tambahkan aksi untuk tombol -->
<script>
    document.querySelector(".btn-upload").addEventListener("click", function() {
        alert("Foto telah diubah!");
    });

    document.querySelector(".btn-delete").addEventListener("click", function() {
        alert("Foto telah dihapus!");
    });

    document.querySelector(".btn-edit-profile").addEventListener("click", function() {
        alert("Profil berhasil diedit!");
    });
</script>