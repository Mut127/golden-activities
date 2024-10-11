<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #ffffff;
            /* Sidebar background color */
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 300px;
            /* Sidebar width */
            z-index: 1000;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .nav-link {
            color: #6c757d;
            font-size: 1rem;
            padding: 15px 25px;
            /* Increased padding */
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link.active {
            background-color: #704FE6;
            /* Active state color */
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .sidebar .nav-link:hover {
            background-color: #704FE6;
            /* Hover state color */
            color: white;
            border-radius: 8px;
        }

        .sidebar .text-center img {
            max-width: 150px;
            /* Logo size */
            margin-bottom: 20px;
        }

        .logout-section {
            padding-bottom: 20px;
        }

        .logout-section .nav-link {
            margin-top: auto;
            padding: 15px 25px;
        }

        /* Scroll handling */
        body,
        html {
            height: 100%;
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4 sidebar">
                <div>
                    <div class="text-center">
                        <img src="{{ asset('images/logoGA.png') }}" alt="Logo" class="img-fluid mb-4">
                    </div>
                    <nav class="nav flex-column">
                        <a class="nav-link active {{ Request::is('/admin-dashboard') ? 'active' : '' }}" href="{{ url('/admin-dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                        <a class="nav-link{{ Request::is('admin-aktivitas') ? 'active' : '' }}" href="{{ url('/admin-aktivitas') }}"><i class="fas fa-tasks"></i> Aktivitas</a>
                        <a class="nav-link{{ Request::is('artikels') ? 'active' : '' }}" href="{{ url('/admin-artikel') }}"><i class="fas fa-newspaper"></i> Artikel</a>
                        <a class="nav-link{{ Request::is('/admin-daftarkegiatan') ? 'active' : '' }}" href="{{ url('/admin-daftarkegiatan') }}"><i class="fas fa-list-alt"></i> Daftar Kegiatan</a>
                        <a class="nav-link{{ Request::is('/admin-pencapaian') ? 'active' : '' }}" href="{{ url('/admin-pencapaian') }}"><i class="fas fa-trophy"></i> Pencapaian</a>
                        <a class="nav-link{{ Request::is('/admin-user') ? 'active' : '' }}" href="{{ url('/admin-user') }}"><i class="fas fa-user"></i> User</a>
                    </nav>
                </div>
                <!-- Logout Section -->
                <div class="logout-section">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>