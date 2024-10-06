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
                <form method="POST" action="/sesi/create" class="sign-up-form">
                    @csrf
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Masukan Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Nama Lengkap" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" name="number" placeholder="No Telepon" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Kata Sandi" onkeyup="checkPassword(this.value)" required />
                        <span id="toggleBtn"></spanid>
                    </div>
                    <div class="validation" id="validation" style="display: none;">
                        <ul>
                            <li id="special">Setidaknya satu karakter khusus (misalnya: !, @, #, $)</li>
                            <li id="number">Setidaknya satu angka (0-9)</li>
                            <li id="lower">Setidaknya satu huruf kecil (a-z)</li>
                            <li id="upper">Setidaknya satu huruf besar (A-Z)</li>
                            <li id="length">Minimal 8 karakter</li>
                        </ul>
                    </div>
                    <input type="submit" id="daftarBtn" class="btn-primaryy" value="Daftar" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel right-panel" data-aos="fade-left">
                <div class="content" style="margin:0%">
                    <h3>Sudah daftar?</h3>
                    <p>
                        Jika sudah terdaftar, masuk ke akun Anda dengan mengklik di sini.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Masuk
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init();

            const sign_in_btn = document.querySelector("#sign-in-btn");
            const sign_up_btn = document.querySelector("#sign-up-btn");
            const container = document.querySelector(".container-fluid");
            const passwordField = document.getElementById('password');
            const validation = document.getElementById('validation');
            let password = document.getElementById('password');
            let toggleBtn = document.getElementById('toggleBtn');

            passwordField.addEventListener('focus', function() {
                validation.style.display = 'block';
            });

            passwordField.addEventListener('input', function() {
                checkPassword(this.value);
            });

            sign_up_btn.addEventListener("click", () => {
                container.classList.add("sign-up-mode");
            });

            sign_in_btn.addEventListener("click", () => {
                container.classList.remove("sign-up-mode");
            });

            function checkPassword(data) {
                const lower = new RegExp('(?=.*[a-z])');
                const upper = new RegExp('(?=.*[A-Z])');
                const number = new RegExp('(?=.*[0-9])');
                const special = new RegExp('(?=.*[!@#\$%\^&\*])');
                const length = new RegExp('(?=.{8,})');

                const lowerCase = document.getElementById('lower');
                const upperCase = document.getElementById('upper');
                const digit = document.getElementById('number');
                const specialChar = document.getElementById('special');
                const minLength = document.getElementById('length');

                if (lower.test(data)) {
                    lowerCase.style.display = 'none';
                } else {
                    lowerCase.style.display = 'block';
                }

                if (upper.test(data)) {
                    upperCase.style.display = 'none';
                } else {
                    upperCase.style.display = 'block';
                }

                if (number.test(data)) {
                    digit.style.display = 'none';
                } else {
                    digit.style.display = 'block';
                }

                if (special.test(data)) {
                    specialChar.style.display = 'none';
                } else {
                    specialChar.style.display = 'block';
                }

                if (length.test(data)) {
                    minLength.style.display = 'none';
                } else {
                    minLength.style.display = 'block';
                }
            }
            const loginPasswordField = document.getElementById('login-password');
            const loginToggleBtn = document.getElementById('login-toggleBtn');

            loginToggleBtn.onclick = function() {
                if (loginPasswordField.type === 'password') {
                    loginPasswordField.setAttribute('type', 'text');
                    loginToggleBtn.classList.add('hide');
                } else {
                    loginPasswordField.setAttribute('type', 'password');
                    loginToggleBtn.classList.remove('hide');
                }
            }
            var alertTimeout = 2000;

            var alerts = document.querySelectorAll('.alert-dismissible');

            alerts.forEach(function(alert) {
                setTimeout(function() {
                    $(alert).alert('close');
                }, alertTimeout);
            });
        });
        toggleBtn.onclick = function() {
            if (password.type === 'password') {
                password.setAttribute('type', 'text');
                toggleBtn.classList.add('hide');
            } else {
                password.setAttribute('type', 'password');
                toggleBtn.classList.remove('hide');
            }
        }
        var alertTimeout = 5000;

        var alerts = document.querySelectorAll('.alert-dismissible');

        alerts.forEach(function(alert) {
            setTimeout(function() {
                $(alert).alert('close');
            }, alertTimeout);
        });
    </script>
</body>

</html>