<!doctype html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/Petugas/HomeP.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-Home.css') }}">
</head>

<style>
    .button-accept {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.button-accept.visible {
    opacity: 1;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>

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
                    <li class="active" style="margin-top: 22px">
                        <a href="" style="font-size: 18px"><span><img src="{{ asset('images/home.png') }}"
                                    alt="" style="margin-right: 13px; margin-bottom:7px"></span> Home</a>
                    </li>
                    <li style="margin-top: 3px">
                        <a href="{{ route('productsP.index') }}" style="font-size: 18px"><span><img src="{{ asset('images/archive.png') }}"
                                    alt="" style="margin-right: 14px; margin-bottom:7px"></span> Product</a>
                    </li>
                    <li style="margin-top: 3px">
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

            <div class="menu-pesanan nav-pills justify-content-left">
                @foreach ($products as $item)
                <div class="card-product" style="background-color: rgb(255, 255, 255)">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="">
                    <p style="font-family: Montserrat, sans-serif; font-weight:700;">{{ $item->nama_product }}</p>
                    <div class="stk-hrg" style="font-family: Montserrat, sans-serif; font-weight:600;">
                        <span>RP. {{ $item->harga }}</span><span class="stok" style="margin-left: 25px">STC {{ $item->stock }}</span>
                    </div>
                    <div class="total">
                        <div class="tambah" data-id="{{ $item->id }}" data-harga="{{ $item->harga }}" data-stock="{{ $item->stock }}">+</div>
                        <div class="angka-tot">0</div>
                        <div class="kurang" data-id="{{ $item->id }}">-</div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="button-accept">
                <button id="confirm-order-btn">
                    <div>
                        <span id="total-item" style="font-size: 20px; font-weight: bold; color: white">0 ITEM</span><br>
                        <span style="font-size: 20px; font-weight: bold; color: white">KASTAR MARKET</span>
                    </div>
                    <div id="total-harga" style="font-size: 30px; font-weight: bold;color: white">
                        RP. 0
                    </div>
                    <img src="{{ asset('images/keranjang.png') }}" alt="">
                </button>
            </div>

            <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="max-height: 200px; overflow-y: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-details">
                                        <!-- Order details will be inserted here by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="payment-input">Amount Paid (RP):</label>
                                <input type="number" class="form-control" id="payment-input" placeholder="Enter amount paid" style="border: 1px solid black">
                            </div>
                            <div class="text-right">
                                <strong>Total: RP. <span id="modal-total-harga">0</span></strong><br>
                                <strong>Change: RP. <span id="modal-change">0</span></strong>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="confirm-btn">Confirm Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    let totalItemElement = document.getElementById('total-item');
    let totalHargaElement = document.getElementById('total-harga');
    let buttonAccept = document.querySelector('.button-accept');
    let items = {}; // Store item quantities by ID
    let totalHarga = 0;

    function updateTotalDisplay() {
        let totalItemCount = Object.values(items).reduce((a, b) => a + b, 0);
        totalItemElement.textContent = `${totalItemCount} ITEM`;
        totalHargaElement.textContent = `RP. ${totalHarga.toLocaleString('id-ID')}`;

        // Show or hide button-accept based on items in the cart
        if (totalItemCount > 0) {
            buttonAccept.classList.add('visible');
        } else {
            buttonAccept.classList.remove('visible');
        }
    }

    function populateOrderDetails() {
        let orderDetailsElement = document.getElementById('order-details');
        let modalTotalHargaElement = document.getElementById('modal-total-harga');
        orderDetailsElement.innerHTML = ''; // Clear previous order details

        let totalModalPrice = 0;

        document.querySelectorAll('.card-product').forEach(card => {
            let productId = card.querySelector('.tambah').dataset.id;
            if (items[productId]) {
                let productName = card.querySelector('p').textContent;
                let quantity = items[productId];
                let price = parseInt(card.querySelector('.tambah').dataset.harga);
                let subtotal = price * quantity;

                let row = `
                    <tr>
                        <td>${productName}</td>
                        <td>${quantity}</td>
                        <td>RP. ${price.toLocaleString('id-ID')}</td>
                        <td>RP. ${subtotal.toLocaleString('id-ID')}</td>
                    </tr>
                `;

                orderDetailsElement.insertAdjacentHTML('beforeend', row);
                totalModalPrice += subtotal;
            }
        });

        modalTotalHargaElement.textContent = totalModalPrice.toLocaleString('id-ID');
        document.getElementById('modal-change').textContent = '0';
        document.getElementById('payment-input').value = '';
    }

    function calculateChange() {
        let paymentInput = document.getElementById('payment-input');
        let modalTotalHargaElement = document.getElementById('modal-total-harga');
        let totalAmount = parseInt(modalTotalHargaElement.textContent.replace(/\D/g, '')) || 0;
        let paymentAmount = parseInt(paymentInput.value) || 0;

        let change = paymentAmount - totalAmount;
        document.getElementById('modal-change').textContent = change >= 0 ? change.toLocaleString('id-ID') : '0';
    }

    document.querySelectorAll('.card-product .tambah').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.dataset.id;
            let productPrice = parseInt(this.dataset.harga);
            let productStock = parseInt(this.dataset.stock);

            if (productStock > 0) {
                items[productId] = (items[productId] || 0) + 1;
                totalHarga += productPrice;
                productStock--;
                this.dataset.stock = productStock;
                this.nextElementSibling.textContent = items[productId];
                this.closest('.card-product').querySelector('.stok').textContent = `STC ${productStock}`;
                updateTotalDisplay();
            } else {
                alert('Stock is empty for this product.');
            }
        });
    });

    document.querySelectorAll('.card-product .kurang').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.dataset.id;
            let productPrice = parseInt(document.querySelector(`.card-product .tambah[data-id="${productId}"]`).dataset.harga);

            if (items[productId] > 0) {
                items[productId]--;
                totalHarga -= productPrice;
                this.previousElementSibling.textContent = items[productId];
                let productStock = parseInt(document.querySelector(`.card-product .tambah[data-id="${productId}"]`).dataset.stock);
                productStock++;
                document.querySelector(`.card-product .tambah[data-id="${productId}"]`).dataset.stock = productStock;
                this.closest('.card-product').querySelector('.stok').textContent = `STC ${productStock}`;
                updateTotalDisplay();
            }
        });
    });

    document.querySelector('.button-accept button').addEventListener('click', function() {
        populateOrderDetails();
        $('#orderModal').modal('show');
    });

    document.getElementById('payment-input').addEventListener('input', calculateChange);

    document.getElementById('confirm-btn').addEventListener('click', function() {
        let paymentAmount = parseInt(document.getElementById('payment-input').value) || 0;
        let modalTotalHarga = parseInt(document.getElementById('modal-total-harga').textContent.replace(/\D/g, '')) || 0;

        if (paymentAmount < modalTotalHarga) {
            alert('Please enter a valid amount that covers the total price.');
            window.location.reload(); // Reload the page after successful order

            return;
        }

        let orderDetails = Object.keys(items).map(productId => ({
            productId: productId,
            quantity: items[productId],
            subtotal: parseInt(document.querySelector(`.card-product .tambah[data-id="${productId}"]`).dataset.harga) * items[productId]
        }));

        fetch('{{ route("penjualan.store") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                totalHarga: totalHarga,
                details: orderDetails
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order placed successfully!');
                window.location.reload(); // Reload the page after successful order
            } else {
                alert('Failed to place the order.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error placing the order.');
        });
    });
});


    </script>
</body>
</html>
