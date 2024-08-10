<!doctype html>
<html lang="en">

<head>
    <title>Crud Petugas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/1.13.1/css/alertify.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/1.13.1/css/themes/default.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Admin/CrudPetugas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-Home.css') }}">
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
                    <li style="margin-top: 3px">
                        <a href="{{ route('HomeA') }}" style="font-size: 18px"><span><img src="{{ asset('images/home.png') }}" alt="" style="margin-right: 13px; margin-bottom:7px"></span> Home</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}" alt="" style="margin-right: 14px; margin-bottom:7px"></span> Product</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('historyA') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}" alt="" style="margin-right: 14px; margin-bottom:7px"></span> History</a>
                    </li>
                    <li >
                        <a href="{{ route('CrudPetugas.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}" alt="" style="margin-right: 10px; margin-bottom:7px"></span> Petugas</a>
                    </li>
                    <li>
                        <a href="{{ route('CrudAdmin.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}" alt="" style="margin-right: 10px; margin-bottom:7px"></span> Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}" alt="" style="margin-right: 10px; margin-bottom:7px"></span> Profile</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-4 pt-5">
            <h2 style="margin-left: 35px; font-family: Montserrat, sans-serif; font-weight:700; color: #1A4AE9;">History</h2>
            <div class="divider"></div>

            <button class="button-Add btn btn-primary" data-toggle="modal" data-target="#addProductModal" style="font-family: Montserrat, sans-serif; font-weight: 600; color: #ffffff;">Download PDF</button>

            <div class="table-history">
                <div style="max-height: 550px; overflow-y: auto;">
                    <table class="table my-5">
                        <thead>
                            <tr>
                                <th>Nama User</th>
                                <th>Pelanggan ID</th>
                                <th>Tanggal Penjualan</th>
                                <th>Total Harga</th>
                                <th>Jumlah Produk</th>
                                <th>Nama Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $item)
                                <tr>
                                    <td>{{ $item->nama_user }}</td>
                                    <td>{{ $item->pelanggan_id }}</td>
                                    <td>{{ $item->tanggal_penjualan }}</td>
                                    <td>{{ $item->total_harga }}</td>
                                    <td>{{ $item->jumlah_produk }}</td>
                                    <td>{{ $item->nama_product }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Petugas Modal -->
    <div class="modal fade" id="addPetugasModal" tabindex="-1" role="dialog" aria-labelledby="addPetugasModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPetugasModalLabel">Tambah Petugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('CrudPetugas.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/1.13.1/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
