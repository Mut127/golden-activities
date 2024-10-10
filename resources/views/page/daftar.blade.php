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
    <link href="{{ asset('css/daftar.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container mt-3">
        <!-- Tombol Kembali -->
        <a href="javascript:history.back()" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <!-- Header Section -->
        <h1 class="header-title text-left">Daftar</h1>
        
        <!-- Event Title -->
        <h2 class="event-title">Klub Buku: Berbagi Cerita, Memperluas Wawasan</h2>
    
        <!-- Event Image -->
        <div class="row mt-4">
            <div class="col-md-12">
                <img src="{{ asset('images/daftar.jpg') }}" alt="Klub Buku" class="img-fluid event-image">
            </div>
        </div>
    
        <!-- Progress Bar showing 25 participants out of 30, centered -->
        <div class="d-flex justify-content-center">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 83.33%;" aria-valuenow="83.33" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <p class="participants-text text-right"><i>25 Peserta telah mendaftar</i> </p>
    
        
        <p class="event-description mt-4">Klub buku adalah aktivitas sosial yang menyenangkan sekaligus bermanfaat bagi lansia. Bergabung dalam sebuah klub buku memungkinkan mereka untuk membaca, mendiskusikan ide-ide, dan berinteraksi dengan teman-teman yang memiliki minat serupa. Kegiatan ini tidak hanya memperkaya wawasan intelektual, tetapi juga menjaga otak tetap aktif. Diskusi dalam kelompok memberikan kesempatan bagi lansia untuk berbicara dan mendengarkan, yang sangat penting untuk menjaga kemampuan kognitif.</p>
        
        <h4>Manfaat:</h4>
        <ul class="event-benefits">
            <li>Meningkatkan kemampuan berpikir kritis dan ingatan.</li>
            <li>Membangun hubungan baru dan mengurangi rasa kesepian.</li>
            <li>Menambah pengetahuan melalui berbagai genre buku yang dibaca.</li>
        </ul>
    
        <!-- Event Information Section -->
        <div class="event-info">
            <p><i class="far fa-calendar-alt"></i> 16 Oktober 2024</p>
            <p><i class="far fa-clock"></i> 10.00 s.d 15.00</p>
            <p><i class="fas fa-map-marker-alt"></i> Caffe Bento, Purwokerto Timur, Jawa Tengah</p>
            <p><i class="fas fa-users"></i> 30 Peserta</p>
        </div>
    
        <!-- Registration Form Section -->
        <div class="form-section">
            <h4>Data Diri :</h4>
            <form>
                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" placeholder="Masukkan nama lengkap Anda">
                </div>
                <div class="form-group">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggalLahir">
                </div>
                <div class="form-group">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenisKelamin">
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukkan alamat lengkap Anda">
                </div>
                <div class="form-group">
                    <label for="nomorTelepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomorTelepon" placeholder="Masukkan nomor telepon Anda">
                </div>
                <button type="submit" class="btn-daftar">Daftar</button>
            </form>
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
