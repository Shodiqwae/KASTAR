<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Register.css') }}">
</head>
<body>
    <div class="gambar">
        <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
    </div>

    <form class="form-container" method="POST" action="{{ route('register.admin.post') }}">
        @csrf
        @if ($errors->any())
        <div class="notification">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
        <div class="input-group">
            <span class="icon">
                <img src="{{ asset('images/user.png') }}" alt="">
            </span>
            <input type="name" id="name" name="name" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="input-group">
            <span class="icon">
                <img src="{{ asset('images/user.png') }}" alt="">
            </span>
            <input type="name" id="email" name="email" placeholder="Gmail" autocomplete="off" required>
        </div>
        <div class="input-group">
            <span class="icon">
                <img src="{{ asset('images/lock.png') }}" alt="">
            </span>
            <input type="password" id="password" name="password"  placeholder="Password" autocomplete="off" required>
        </div>
        <div class="input-group">
            <span class="icon">
                <img src="{{ asset('images/lock.png') }}" alt="">
            </span>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" autocomplete="off" required>
        </div>
        <div class="button-wrapper">
            <button type="submit" style="font-family: Montserrat, sans-serif; font-weight: 600; color: #2148C0" > SUBMIT </button>
        </div>
    </form>
    <script>
        // Fungsi untuk memeriksa apakah password dan konfirmasi password cocok
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("password_confirmation").value;

            // Jika password dan konfirmasi password tidak cocok, tampilkan pesan kesalahan
            if (password != confirmPassword) {
                alert("Password and Confirm Password do not match");
                return false;
            }
            return true;
        }

        // Menambahkan event listener untuk form submit
        document.getElementById("registration-form").addEventListener("submit", function(event) {
            if (!validatePassword()) {
                event.preventDefault(); // Mencegah pengiriman formulir jika password tidak cocok
            }
        });
    </script>
</body>
</html>
