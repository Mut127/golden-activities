@extends('layouts.app-admin')

@section('title', 'Edit Artikel')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List - BahteraKarsa</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            position: fixed;
            /* Sidebar tetap di tempat */
            width: 250px;
            /* Lebar sidebar */
            height: 100vh;
            /* Sidebar full height */
            background-color: #f8f9fa;
            padding-top: 20px;
            z-index: 1000;
            /* Pastikan sidebar di atas konten lainnya */
        }

        .content {
            margin-left: 250px;
            /* Sesuaikan margin dengan lebar sidebar */
            padding: 40px;
            background-color: #f0f0f0;
            min-height: 100vh;
            /* Buat konten full height agar rapi */
        }

        .form-container {
            max-width: 600px;
            /* Batasi lebar form */
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-control {
            font-size: 0.9rem;
            /* Ukuran font form lebih kecil */
            padding: 8px;
            /* Kurangi padding */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                /* Untuk tampilan mobile, sidebar penuh */
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
                /* Untuk tampilan mobile, tidak ada margin kiri */
            }
        }
    </style>

</head>

<div class="content">
    <div class="form-container">

        <form method="POST" action="{{ route('artikels.update', $artikels->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $artikels->judul}}" required>
                @if ($errors->has('judul'))
                <div class="text-danger">{{ $errors->first('judul') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $artikels->content }}</textarea>
                @if ($errors->has('content'))
                <div class="text-danger">{{ $errors->first('content') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="image_path" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="image_path" name="image_path">
                @if ($errors->has('image_path'))
                <div class="text-danger">{{ $errors->first('image_path') }}</div>
                @endif
                @if ($artikels->image_path)
                <img src="{{ asset('storage/' . $artikels->image_path) }}" alt="Article Image" class="img-fluid mt-2">
                @endif
            </div>
            <div class="d-flex justify-content-start" style="margin-bottom: 3%;">
                <button type="submit" class="btn btn-primary" style="margin-right: 1%">Edit</button>
                <a href="{{ route('artikels.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection


@section('extra-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection