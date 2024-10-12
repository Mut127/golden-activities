@extends('layouts.app-admin')

@section('title', 'Edit User')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - BahteraKarsa</title>
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
            width: 250px;
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
            z-index: 1000;
        }

        .content {
            margin-left: 250px;
            padding: 40px;
            background-color: #f0f0f0;
            min-height: 100vh;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-control {
            font-size: 0.9rem;
            padding: 8px;
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
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>

</head>

<div class="content">
    <div class="form-container">

        <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                @if ($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="number" name="number" value="{{ $user->number }}" required>
                @if ($errors->has('number'))
                <div class="text-danger">{{ $errors->first('number') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="profile_image" class="form-label">Gambar Profil</label>
                <input type="file" class="form-control" id="profile_image" name="profile_image">
                @if ($errors->has('profile_image'))
                <div class="text-danger">{{ $errors->first('profile_image') }}</div>
                @endif
                @if ($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="User Image" class="img-fluid mt-2">
                @endif
            </div>
            <div class="mb-3">
                <label for="usertype" class="form-label">Jenis Pengguna</label>
                <select class="form-control" id="usertype" name="usertype" required>
                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="pengguna" {{ $user->usertype == 'pengguna' ? 'selected' : '' }}>User</option>
                </select>
                @if ($errors->has('usertype'))
                <div class="text-danger">{{ $errors->first('usertype') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="d-flex justify-content-start" style="margin-bottom: 3%;">
                <button type="submit" class="btn btn-primary" style="margin-right: 1%">Simpan Perubahan</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection


@section('extra-js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection