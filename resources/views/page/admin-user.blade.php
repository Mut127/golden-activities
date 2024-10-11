<!DOCTYPE html>
<html lang="en">
@extends('layouts.app-admin')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List - BahteraKarsa</title>
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

        .btn-tambah-user {
            background-color: #FFD25D;
            color: black;
            border: none;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .btn-tambah-user:hover {
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
                <h3 class="mb-4">User List</h3>
                <button type="button" class="btn create-btn btn-tambah-user" data-toggle="modal" data-target="#createUserModal">
                    <i class="fa-solid fa-plus"></i> Tambah User
                </button>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Email Verified At</th>
                                <th scope="col">Number</th>
                                <th scope="col">Profile Image</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>{{ $user->number }}</td>
                                <td><img src="{{ Storage::url($user->profile_image) }}" alt="Profile Image" width="100"></td>
                                <td>{{ $user->usertype }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for creating a new user -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Buat User Baru</h5>
                </div>
                <div class="modal-body">
                    <form id="userForm" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="userName">Nama User</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama user">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email User</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email user">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userNumber">Nomor Telepon User</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}" placeholder="Masukkan nomor telepon user">
                            @error('number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userImage">Gambar Profil</label>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                            <div id="uploaded-files" class="uploaded-files"></div>
                            @error('profile_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="userType">Jenis Pengguna</label>
                            <select id="usertype" name="usertype" class="form-control" required>
                                <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('usertype')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password user">
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password user">
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
