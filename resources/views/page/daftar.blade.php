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
        <h2 class="event-title">{{$aktivitas->judul}}</h2>

        <!-- Event Image -->
        <div class="row mt-4">
            <div class="col-md-12">
                <img src="{{ asset('storage/' . $aktivitas->image_path) }}" alt="{{ $aktivitas->judul }}" class="img-fluid event-image">
                <p class="image-caption">Foto: {{ $aktivitas->judul }}</p>

            </div>
        </div>

        <!-- Progress Bar showing 25 participants out of 30, centered -->
        <div class="d-flex justify-content-center">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 83.33%;" aria-valuenow="83.33" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <p class="participants-text text-right"><i>25 Peserta telah mendaftar</i> </p>


        <div class="aktivitas-content">
            {!! $aktivitas->deskripsi !!}
        </div>

        <!-- Event Information Section -->
        <div class="event-info">
            <p><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($aktivitas->tgl_pelaksanaan)->format('d-m-Y') }}4</p>
            <p><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($aktivitas->waktu_pelaksanaan)->format('H:i') }}</p>
            <p><i class="fas fa-map-marker-alt"></i>{{ $aktivitas->alamat}}</p>
            <p><i class="fas fa-users"></i> {{ $aktivitas->kuota}}</p>
        </div>

        <!-- Registration Form Section -->
        <div class="form-section">
            <h4>Data Diri :</h4>
            <form id="daftarForm" method="POST" action="{{ route('daftar_kegiatans.daftar') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="namaLengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="namaLengkap" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggalLahir" name="tgl_lahir" value="{{old('tgl_lahir')}}" required>
                    @error('tgl_lahir')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenisKelamin" name="jk" required>
                        <option value="laki-laki" {{ old('jk') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ old('jk') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap Anda" value="{{old('alamat')}}" required>
                    @error('alamat')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nomorTelepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomorTelepon" name="number" placeholder="Masukkan nomor telepon Anda" value="{{old('number')}}" required>
                    @error('number')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="aktivitas_id" value="{{ $aktivitas->id ?? '' }}">


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