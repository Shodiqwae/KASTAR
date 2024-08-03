<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/LoginPage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="gambar">
        <img src="{{ asset('images/logo.png') }}" alt="">
    </div>

    <div class="form-container">
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="input-group">
                <span class="icon">
                    <img src="{{ asset('images/user.png') }}" alt="">
                </span>
                <input type="text" name="email" placeholder="Gmail" autocomplete="off" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <img src="{{ asset('images/lock.png') }}" alt="">
                </span>
                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="button-group">
                <button type="button" style="font-family: Montserrat, sans-serif; font-weight: 600; color: #2148C0" id="openPopupBtn"> REGISTER ADMIN </button>
                <button type="submit" style="font-family: Montserrat, sans-serif; font-weight: 600; color: #2148C0"> LOGIN </button>
            </div>
        </form>
        <div id="backdrop" class="backdrop"></div>
        <div id="popup" class="popup">
            <form id="passwordForm">
                <label for="password">Enter Password:</label>
                <input type="password" id="password" required>
                <button type="submit">Submit</button>
                <button type="button" id="cancelBtn">Cancel</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const openPopupBtn = document.getElementById("openPopupBtn");
            const popup = document.getElementById("popup");
            const backdrop = document.getElementById("backdrop");
            const passwordForm = document.getElementById("passwordForm");
            const cancelBtn = document.getElementById("cancelBtn");

            const correctPassword = "adminaja07"; // Ganti dengan password yang diinginkan

            openPopupBtn.addEventListener("click", function() {
                popup.style.display = "block";
                backdrop.style.display = "block";
            });

            backdrop.addEventListener("click", function() {
                popup.style.display = "none";
                backdrop.style.display = "none";
            });

            cancelBtn.addEventListener("click", function() {
                popup.style.display = "none";
                backdrop.style.display = "none";
            });

            passwordForm.addEventListener("submit", function(event) {
                event.preventDefault();
                const enteredPassword = document.getElementById("password").value;

                if (enteredPassword === correctPassword) {
                    window.location.href = "/register";
                } else {
                    alertify.error("Incorrect Password. Try Again.");
                    popup.style.display = "none";
                    backdrop.style.display = "none";
                }
            });
        });
    </script>

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                alertify.error("The provided credentials do not match our records.");
            });
        </script>
    @endif

</body>
</html>
