<!doctype html>
<html lang="en">

<head>
    <title>Home Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin/profileA.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-Home.css') }}">

    <style>
        /* Style for disabled save button */
        #saveButton:disabled {
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
        }

        /* Style for enabled save button */
        #saveButton {
            background-color: #1A4AE9;
            color: white;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
            <div class="p-4">
                <div class='Gambar'>
                    <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
                </div>
                <ul class="list-unstyled components mb-5 list-sidebar" style="font-family: Montserrat, sans-serif; font-weight:500;">
                    <li  style="margin-top: 3px">
                        <a href="{{ route('HomeA') }}" style="font-size: 18px"><span><img src="{{ asset('images/home.png') }}"
                                    alt="" style="margin-right: 13px; margin-bottom:7px"></span> Home</a>
                    </li>
                    <li >
                        <a href="{{ route('products.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> Product</a>
                    </li>
                    <li>
                        <a href="{{ route('historyA') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> History</a>
                    </li>
                    <li>
                        <a href="{{ route('CrudPetugas.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Petugas</a>
                    </li>
                    <li>
                        <a href="{{ route('CrudAdmin.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Admin</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('profile.edit') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Profile</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-4 pt-5">
            <h2 style="margin-left: 35px; font-family: Montserrat, sans-serif; font-weight:700; color: #1A4AE9">Profile</h2>
            <div class="divider"></div>

            <form  class="form-profil" id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" id="profile_picture" name="profile_picture" >
                    @if($user->gambar)
                        <img src="{{ asset('images/' . auth()->user()->gambar) }}" alt="Profile Picture" width="100">
                    @endif
                </div>
                <div>
                    <div style="font-size: 15px">Username</div>
                    <input type="text" style="background-color: rgb(187, 192, 214); color: rgb(0, 0, 0); " id="name" name="name" placeholder="Nama" value="{{ old('name', $user->name) }}">
                </div>
                <div>
                    <div style="font-size: 15px">Alamat</div>
                    <input type="text" style="background-color: rgb(187, 192, 214); color: rgb(0, 0, 0); " id="address" name="alamat" placeholder="Alamat" value="{{ old('alamat', $user->alamat) }}">
                </div>
                <div>
                    <div style="font-size: 15px">Password Lama</div>
                    <input style="background-color: rgb(187, 192, 214); color: rgb(0, 0, 0); " type="password" id="old_password" name="old_password" placeholder="Password Lama">
                </div>
                <div>
                    <div style="font-size: 15px">Password Baru</div>
                    <input style="background-color: rgb(187, 192, 214); color: rgb(0, 0, 0); " type="password" id="new_password" name="new_password" placeholder="Password Baru">
                </div>
                <div>
                    <div style="font-size: 15px">Konfirmasi Password Baru</div>
                    <input style="background-color: rgb(187, 192, 214); color: rgb(0, 0, 0); " type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Konfirmasi Password Baru">
                </div>
                <button type="submit" id="saveButton" style="margin-top: 20px" disabled>Save</button>
            </form>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="Btn" style="margin-top: 20px" type="submit">

                    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>

                    <div class="text">Logout</div>
                </button>
            </form>




        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            // Store the initial form data
            var initialFormState = $('#profileForm').serialize();

            // Function to check if the form data has changed
            function checkFormChange() {
                if ($('#profileForm').serialize() !== initialFormState) {
                    $('#saveButton').prop('disabled', false); // Enable button
                } else {
                    $('#saveButton').prop('disabled', true); // Disable button
                }
            }

            // Attach change and input events to form inputs
            $('#profileForm').on('input change', function() {
                checkFormChange();
            });
        });
    </script>

</body>

</html>
