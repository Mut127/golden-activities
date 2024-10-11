<!DOCTYPE html>
<html lang="id">

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
    <link href="{{ asset('css/detailartikel.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <!-- Tombol Kembali -->
        <a href="javascript:history.back()" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="article-container">
            <!-- Header Artikel -->
            <div class="article-header">
                <h1>{{ $artikels->judul }}</h1>
                <p class="article-meta">By {{ $artikels->user->name}} | {{ $artikels->created_at->format('d F Y') }}</p>
            </div>

            <!-- Konten Artikel -->
            <div class="article-content">
                <img src="{{ asset('storage/' . $artikels->image_path) }}" alt="{{ $artikels->judul}}" class="img-fluid">
                <p class="image-caption">Foto: {{ $artikels->judul }}</p>
            </div>
            <div class="article-content">
                {!! $artikels->content !!}
            </div>
        </div>
    </div>
    <!-- JavaScript untuk Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>