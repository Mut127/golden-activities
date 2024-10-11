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

<body>
    <div class="content">
        <div class="form-container">
            <form method="POST" action="{{ route('aktivitas.update', $aktivitas->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="aktivitasTitle">Judul Aktivitas</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $aktivitas->judul }}" required>
                    @if ($errors->has('judul'))
                    <div class="alert alert-danger">{{ $errors->first('judul') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="aktivitasContent">Deskripsi Aktivitas</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required>{{ $aktivitas->deskripsi }}</textarea>
                    @if ($errors->has('deskripsi'))
                    <div class="alert alert-danger">{{ $errors->first('deskripsi') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image_path" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="image_path" name="image_path">
                    <div id="uploaded-files" class="uploaded-files"></div>
                    @if ($errors->has('image_path'))
                    <div class="text-danger">{{ $errors->first('image_path') }}</div>
                    @endif
                    @if ($aktivitas->image_path)
                    <img src="{{ asset('storage/' . $aktivitas->image_path) }}" alt="Forums Image" class="img-fluid mt-2">
                    @endif
                </div>
                <div class="form-group">
                    <label for="aktivitasDate">Tanggal Pelaksanaan</label>
                    <input type="date" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="{{ $aktivitas->tgl_pelaksanaan }}" required>
                    @if ($errors->has('tgl_pelaksanaan'))
                    <div class="alert alert-danger">{{ $errors->first('tgl_pelaksanaan') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="aktivitasTime">Jam Pelaksanaan</label>
                    <input type="time" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="{{ $aktivitas->waktu_pelaksanaan}}" required>
                    @if ($errors->has('waktu_pelaksanaan'))
                    <div class="alert alert-danger">{{ $errors->first('waktu_pelaksanaan') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="aktivitasAddress">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="2" required>{{ $aktivitas->alamat }}</textarea>
                    @if ($errors->has('alamat'))
                    <div class="alert alert-danger">{{ $errors->first('alamat') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="aktivitasKuota">Kuota</label>
                    <input type="number" class="form-control" id="kuota" name="kuota" value="{{  $aktivitas->kuota }}" required>
                    @if ($errors->has('kuota'))
                    <div class="alert alert-danger">{{ $errors->first('kuota') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select id="kategori" name="kategori" class="form-control" style="height:50px" required>
                        <option value="online" {{ old('kategori', $aktivitas->kategori) == 'online' ? 'selected' : '' }}>Online</option>
                        <option value="offline" {{ old('kategori', $aktivitas->kategori) == 'offline' ? 'selected' : '' }}>Offline</option>
                    </select>
                    @if ($errors->has('kategori'))
                    <div class="text-danger">{{ $errors->first('kategori') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Buat</button>
                <a href="{{ route('aktivitas.index') }}" class="btn btn-danger">Batal</a>
            </form>
        </div>
    </div>



    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
@endsection

</html>