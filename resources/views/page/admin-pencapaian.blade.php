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
            margin-left: 250px; /* Sidebar width */
            padding: 40px;
        }

        .table-container {
            width: 100%;
            overflow-x: auto; /* Enable horizontal scrolling */
            background-color: #ffffff;
            margin-right: 20px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table {
            width: 150%; /* Increase the width of the table */
            max-width: none; /* Disable the max-width restriction */
            font-size: 0.9rem; /* Reduce font size */
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: left;
            padding: 12px; /* Reduce padding to make table more compact */
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
                margin-left: 0; /* Remove margin for mobile screens */
            }

            .table-container {
                width: 100%; /* Ensure table fits on small screens */
            }

            .table {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-10 content">
            <h3 class="mb-4">Content List</h3>
            <div class="table-container">
                <table class="table table-hover">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Aktivitas ID</th>
                        <th scope="col">Daftar Kegiatan ID</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>101</td>
                        <td>201</td>
                        <td>301</td>
                        <td>2024-05-01</td>
                        <td>2024-05-10</td>
                        <td>
                            <div class="action-icons">
                                <a href="#" class="edit"><i class="fas fa-edit"></i></a>
                                <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>102</td>
                        <td>202</td>
                        <td>302</td>
                        <td>2024-05-05</td>
                        <td>2024-05-15</td>
                        <td>
                            <div class="action-icons">
                                <a href="#" class="edit"><i class="fas fa-edit"></i></a>
                                <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <!-- Additional rows can go here -->
                    </tbody>
                </table>
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
