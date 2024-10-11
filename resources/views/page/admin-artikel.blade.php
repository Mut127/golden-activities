<!DOCTYPE html>
<html lang="en">
@extends('layouts.app-admin')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content List - BahteraKarsa</title>
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
            width: 150%;
            /* Increase the width of the table */
            max-width: none;
            /* Disable the max-width restriction */
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
                <h3 class="mb-4">Content List</h3>
                <button type="button" class="btn create-btn btn-tambah-aktivitas" data-toggle="modal" data-target="#createArtikelModal">
                    <i class="fa-solid fa-plus"></i> Tambah Artikel
                </button>  
                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image Path</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artikels as $artikel)
                            <tr>
                                <td>{{ $artikel->id }}</td>
                                <td>{!! $artikel->judul !!}</td>
                                <td>{{ Str::limit($artikel->content, 20)}}</td>
                                <td> <img src="{{ Storage::url($artikel->image_path) }}" style="width: 100px; height: 100px;"></td>
                                <td>{{ $artikel->user->name }}</td>
                                <td>
                                    <div class="action-icons">
                                        <a class="edit" href="{{ route('artikels.edit', $artikel->id) }}"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('artikels.destroy', $artikel->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"><i class="fas fa-trash-alt"></i></button>
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
    <div class="modal fade" id="createArtikelModal" tabindex="-1" aria-labelledby="createArtikelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createArtikelModalLabel">Buat Artikel Baru</h5>
                </div>
                <div class="modal-body">
                    <form id="artikelForm" method="POST" action="{{ route('artikels.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="artikelTitle">Judul Artikel</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Masukkan judul artikels">
                            @error('judul')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="artikelContent">Content artikels</label>
                            <textarea class="form-control" name="content" id="content" rows="5" placeholder="Masukkan content artikels">{{ old('content') }}</textarea>
                            @error('content')
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