<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin/HomeA.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-Home.css') }}">

</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">

            <div class="p-4">
                <div class='Gambar'>
                    <img src="{{ asset('images/logo.png') }}" alt="" srcset="">
                </div>
                <ul class="list-unstyled components mb-5 list-sidebar">
                    <li class="active">
                        <a href="#" style="font-size: 18px"><span><img src="{{ asset('images/home.png') }}"
                                    alt="" style="margin-right: 13px; margin-bottom:7px"></span> Home</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> Product</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> History</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Petugas</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Admin</a>
                    </li>
                    <li>
                        <a href="#" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Profile</a>
                    </li>
                </ul>




            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-4 pt-5">

            <h2 style="margin-left: 25px; font-family: Montserrat, sans-serif; font-weight:700; color: #1A4AE9">JUMLAH DATA</h2>
            <div class="divider"></div>

            <div class="box-count">

                <div class="box-user">
                    <span>
                        <img src="{{ asset('images/user-white.png') }}" alt="Logo Ilang" style="margin-left: 10px; margin-bottom: 20px">
                        <span style="color: white;font-family: Montserrat, sans-serif; font-weight: 600; font-size: 33px; line-height: 100px; margin-left: 15px ">USER :</span>
                    </span>
                </div>
                <div class="box-product">
                    <span>
                        <img src="{{ asset('images/archive-white.png') }}" alt="Logo Ilang" style="margin-left: 25px; margin-bottom: 20px">
                        <span style="color: white;font-family: Montserrat, sans-serif; font-weight: 600; font-size: 33px; line-height: 100px; margin-left: 15px ">Product :</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
