@extends('layouts.app')

@section('title', 'Reward')

@section('content')

<!-- Konten To Do List -->
<div class="todo-container">
    <h2>Daftar Aktivitas</h2>
    <p class="todo-subtitle">Lihat jadwal dari kegiatan Anda</p>
    <div class="todo-month">
        <h3>Oktober</h3>

        <div class="todo-item">
            <input type="checkbox" class="todo-checkbox">
            <div class="todo-content">
                <div class="todo-header">
                    <div class="todo-date">
                        <span class="todo-day">Rabu</span> <!-- Hari -->
                        <span class="todo-date-number">06</span> <!-- Tanggal -->
                    </div>
                    <div class="divider"></div> <!-- Garis pemisah -->
                    <div class="todo-details">
                        <span class="todo-time"><i class="fas fa-clock"></i> 09.00 - 11.30</span>
                        <span class="todo-location"><i class="fas fa-map-marker-alt"></i> Caffe Ejiji</span>
                    </div>
                    <div class="divider"></div> <!-- Garis pemisah -->
                    <span class="todo-title">Teknologi untuk Lansia: Kelas Digital yang Mudah dan Bermanfaat</span>
                </div>
            </div>
        </div>

        <div class="todo-item">
            <input type="checkbox" class="todo-checkbox">
            <div class="todo-content">
                <div class="todo-header">
                    <div class="todo-date">
                        <span class="todo-day">Kamis</span>
                        <span class="todo-date-number">07</span>
                    </div>
                    <div class="divider"></div>
                    <div class="todo-details">
                        <span class="todo-time"><i class="fas fa-clock"></i> 13.00 - 15.00</span>
                        <span class="todo-location"><i class="fas fa-map-marker-alt"></i> Ruang Pertemuan A</span>
                    </div>
                    <div class="divider"></div>
                    <span class="todo-title">Diskusi Tentang Kesehatan Mental</span>
                </div>
            </div>
        </div>

        <div class="todo-item">
            <input type="checkbox" class="todo-checkbox">
            <div class="todo-content">
                <div class="todo-header">
                    <div class="todo-date">
                        <span class="todo-day">Sabtu</span>
                        <span class="todo-date-number">09</span>
                    </div>
                    <div class="divider"></div>
                    <div class="todo-details">
                        <span class="todo-time"><i class="fas fa-clock"></i> 14.00 - 16.00</span>
                        <span class="todo-location"><i class="fas fa-map-marker-alt"></i> Ruang Pelatihan B</span>
                    </div>
                    <div class="divider"></div>
                    <span class="todo-title">Pelatihan Manajemen Waktu</span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection