<!doctype html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Petugas/history.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-Home.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <ul class="list-unstyled components mb-5 list-sidebar" style="font-family: Montserrat, sans-serif; font-weight:500;">
                    <li style="margin-top: 22px">
                        <a href="{{ route('HomeP') }}" style="font-size: 18px"><span><img src="{{ asset('images/home.png') }}"
                                    alt="" style="margin-right: 13px; margin-bottom:7px"></span> Home</a>
                    </li>
                    <li  style="margin-top: 3px">
                        <a href="{{ route('productsP.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> Product</a>
                    </li>
                    <li class="active" style="margin-top: 3px">
                        <a href="{{  route('historyP') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> History</a>
                    </li>

                    <li style="margin-top: 3px">
                        <a href="{{ route('profile.petugas') }}" style="font-size: 18px"><span><img src="{{ asset('images/user (1).png') }}"
                                    alt="" style="margin-right: 10px; margin-bottom:7px"></span> Profile</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="content" class="p-4 p-md-4 pt-5">
            <h2 style="margin-left: 35px; font-family: Montserrat, sans-serif; font-weight:700; color: #1A4AE9;">History</h2>
            <div class="divider"></div>

            <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Detail transaksi akan dimuat di sini -->
                <div id="detail-content">
                    <!-- Konten akan dimasukkan dengan JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



            <div class="table-history">
                <div style="max-height: 550px; overflow-y: auto;">
                    <table class="table my-5">
                        <thead>
                            <tr>
                                <th>id transaksi</th>
                                <th>Pelanggan ID</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pelanggan_id }}</td>
                                <td>{{ $item->tanggal_penjualan }}</td>
                                <td>{{ $item->total_harga }}</td>
                                <td>
                                    <button class="btn btn-primary detail-btn" data-toggle="modal" data-target="#detailModal" data-id="{{ $item->id }}">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            $('.detail-btn').on('click', function() {
                const transaksiId = $(this).data('id'); // Ambil ID transaksi dari tombol yang diklik
                const details = @json($details); // Ambil data detail dari controller

                // Bersihkan konten modal sebelumnya
                $('#detail-content').empty();

                // Periksa apakah ada detail untuk transaksi ini
                if (details[transaksiId]) {
                    // Ambil data detail
                    let content = '<table class="table table-bordered">';
                    content += '<thead><tr><th>Nama Produk</th><th>Jumlah Produk</th><th>Subtotal</th></tr></thead><tbody>';

                    // Iterasi melalui detail transaksi
                    details[transaksiId].forEach(detail => {
                        content += `<tr>
                                        <td>${detail.nama_product}</td>
                                        <td>${detail.jumlah_produk}</td>
                                        <td>${detail.subtotal}</td>
                                    </tr>`;
                    });

                    content += '</tbody></table>';
                    $('#detail-content').html(content); // Tambahkan konten ke modal
                } else {
                    $('#detail-content').html('<p>Detail tidak tersedia untuk transaksi ini.</p>');
                }
            });
        });
    </script>


    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                const productId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</body>

</html>
