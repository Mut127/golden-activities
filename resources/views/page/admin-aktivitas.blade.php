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
            /* Sidebar width */
            padding: 40px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            /* Enable horizontal scrolling */
            background-color: #ffffff;
            margin-right: 20px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table {
            width: 100%;
            max-width: 1200px;
            /* Set maximum width for the table */
            font-size: 0.9rem;
            /* Reduce font size */
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: left;
            padding: 12px;
            /* Reduce padding to make table more compact */
        }

        .action-icons {
            font-size: 1.2rem;
        }

        .action-icons .edit {
            color: #007bff;
            margin-right: 10px;
        }

        .action-icons .delete {
            color: #dc3545;
        }

        /* Ensure action buttons stay together and don't overlap */
        .action-icons {
            display: flex;
            justify-content: center;
        }

        /* Make the table responsive for smaller screens */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
                /* Remove margin for mobile screens */
            }

            .table-container {
                width: 100%;
                /* Ensure table fits on small screens */
            }

            .table {
                width: 100%;
            }
        }
        .btn-tambah-aktivitas {
        background-color: #FFD25D;
        color: black;
        border: none;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .btn-tambah-aktivitas:hover {
        background-color: #e6b84b;
        /* Sedikit lebih gelap saat dihover */
        color: black;
    }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-10 content">
                <h3 class="mb-4">Event List</h3>
                <button type="button" class="btn create-btn btn-tambah-aktivitas" data-toggle="modal" data-target="#createAktivitasModal">
                    <i class="fa-solid fa-plus"></i> Tambah Aktivitas
                </button>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Image</th>
                                <th scope="col">Tgl Pelaksanaan</th>
                                <th scope="col">Waktu Pelaksanaan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kuota</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aktivitas as $act)
                            <tr>
                                <td>{{ $act->id }}</td>
                                <td>{!! $act->judul !!}</td>
                                <td>{{ Str::limit($act->deskripsi, 20)}}</td>
                                <td>
                                    @if($act->image_path)
                                        <img src="{{ Storage::url($act->image_path) }}" style="width: 100px; height: 100px;">
                                    @else
                                        <p>No image</p>
                                    @endif
                                </td>
                                <td>{{ $act->tgl_pelaksanaan }}</td>
                                <td>{{ $act->waktu_pelaksanaan }}</td>
                                <td>{!! $act->alamat !!}</td>
                                <td>{{ $act->kuota }}</td>
                                <td>{{ $act->kategori }}</td>
                                <td>{{ $act->user->name }}</td>
                                <td>
                                    <div class="action-icons">
                                        <a class="edit" href="{{ route('aktivitas.edit', $act->id) }}"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('aktivitas.destroy', $act->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus aktivitas ini?')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="createAktivitasModal" tabindex="-1" aria-labelledby="createAktivitasModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAktivitasModalLabel">Buat Aktivitas Baru</h5>
                </div>
                <div class="modal-body">
                    <form id="aktivitasForm" method="POST" action="{{ route('aktivitas.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="aktivitasTitle">Judul Aktivitas</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul aktivitas">
                            @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="aktivitasContent">Deskripsi Aktivitas</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Masukkan deskripsi aktivitas">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image_path" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image_path" name="image_path">
                            <div id="uploaded-files" class="uploaded-files"></div>
                            @if ($errors->has('image_path'))
                            <div class="text-danger">{{ $errors->first('image_path') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="aktivitasDate">Tanggal Pelaksanaan</label>
                            <input type="date" class="form-control" id="tgl_pelaksanaan" name="tgl_pelaksanaan" value="{{ old('tgl_pelaksanaan') }}" placeholder="Masukkan tanggal aktivitas">
                            @error('tgl_pelaksanaan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="aktivitasTime">Jam Pelaksanaan</label>
                            <input type="time" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" value="{{ old('waktu_pelaksanaan') }}" placeholder="Masukkan waktu aktivitas">
                            @error('waktu_pelaksanaan')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="aktivitasAddress">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="2" placeholder="Masukkan alamat aktivitas">{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="aktivitasKuota">Kuota</label>
                            <input type="number" class="form-control" id="kuota" name="kuota" value="{{ old('kuota') }}" placeholder="Masukkan kuota aktivitas">
                            @error('kuota')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select id="kategori" name="kategori" class="form-control" style="height:50px" required>
                                <option value="online" {{ old('kategori') == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="offline" {{ old('kategori') == 'offline' ? 'selected' : '' }}>Offline</option>
                            </select>
                        </div>
    
                        <button type="submit" class="btn btn-primary">Buat</button>
                        <button type="button" id="cancel-button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
@endsection

</html>