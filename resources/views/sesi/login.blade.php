<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Golden Activities')</title>
</head>

<body>
    <div class="container-fluid">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="/sesi/loggin" class="sign-in-form">
                    @csrf
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="email" value="{{ Session::get('email')}}" placeholder="Masukan Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Kata Sandi" required id="login-password" />
                        <span id="login-toggleBtn"></span>
                    </div>
                    <input type="submit" value="Masuk" class="btn-primaryy" />
                    <div class="text-kembali mt-1 top-right">
                        <a href="{{ url('/') }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel" data-aos="fade-right">
                <div class="content" style="margin:0%">
                    <h3>Belum punya akun?</h3>
                    <p>
                        Klik di bawah ini untuk membuat akun
                    </p>
                    <button>
                        <a href="{{ url('sesi/register') }}">Daftar</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>