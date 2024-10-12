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
    <link href="{{ asset('css/todolist.css') }}" rel="stylesheet">

</head>

<body>
    <!-- Konten To Do List -->

    <div class="todo-container">
        <h2>Daftar Aktivitas</h2>
        <p class="todo-subtitle">Lihat jadwal dari kegiatan Anda</p>
        @if($daftar_kegiatans->count() > 0)
        <div class="todo-month">
            <h3>Oktober</h3>
            @foreach($daftar_kegiatans as $daftar)
            @auth
            @if ($daftar->user_id == Auth::user()->id)
            <div class="todo-item">
                <input type="checkbox" class="todo-checkbox">
                <div class="todo-content">
                    <div class="todo-header">
                        <div class="todo-date">
                            <span class="todo-day">{{ \Carbon\Carbon::parse($daftar->aktivitas->tgl_pelaksanaan)->translatedFormat('l') }}</span> <!-- Hari -->
                            <span class="todo-date-number">{{ \Carbon\Carbon::parse($daftar->aktivitas->tgl_pelaksanaan)->translatedFormat('d') }}</span> <!-- Tanggal -->
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                        <div class="todo-details">
                            <span class="todo-time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($daftar->aktivitas->waktu_pelaksanaan)->translatedFormat('H:i') }}</span>
                            <span class="todo-location"><i class="fas fa-map-marker-alt"></i> {{$daftar->aktivitas->alamat}}</span>
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                        <span class="todo-title">{{$daftar->aktivitas->judul}}</span>
                    </div>
                </div>
            </div>
            @endif
            @endauth
            @endforeach
        </div>
        @else
        <div class="text-center my-5">
            <h2 class="display-2" style="font-weight: bold; color:#9E9E9E; text-align: center;">Tidak ada kegiatan</h2>
            <p class="lead">Belum ada kegiatan yang diikuti saat ini.</p>
        </div>
        @endif
    </div>

</body>
@endsection

</html>