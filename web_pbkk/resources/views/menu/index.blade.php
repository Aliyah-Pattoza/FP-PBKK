@extends('layouts.main')

@section('title', 'Menu')

@section('container')
    <form id="order-form" method="POST" action="{{ route('orders.store') }}">
        @csrf
        <!-- Filter berdasarkan kategori -->
        <div class="mb-4">
            <a href="{{ route('menu.index', ['category' => 'all']) }}" 
               class="btn btn-warning {{ $category == 'all' ? 'active' : '' }}">All</a>
            <a href="{{ route('menu.index', ['category' => 'drink']) }}" 
               class="btn btn-warning {{ $category == 'drink' ? 'active' : '' }}">Drinks</a>
            <a href="{{ route('menu.index', ['category' => 'food']) }}" 
               class="btn btn-warning {{ $category == 'food' ? 'active' : '' }}">Foods</a>
            <a href="{{ route('menu.index', ['category' => 'dessert']) }}" 
               class="btn btn-warning {{ $category == 'dessert' ? 'active' : '' }}">Desserts</a>
               <button type="button" class="btn btn-danger" id="confirm-order-btn" data-bs-toggle="modal" data-bs-target="#orderModal">Pesan Sekarang</button>
        </div>

        <!-- Daftar menu berdasarkan kategori -->
        <div class="row">
            @if ($menus && count($menus) > 0)
                @foreach($menus as $menu)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <!-- Gambar menu -->
                            <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://via.placeholder.com/150' }}" 
                                 class="card-img-top" 
                                 alt="{{ $menu->name }}">

                            <div class="card-body d-flex flex-column">
                                <!-- Nama dan deskripsi menu -->
                                <h5 class="card-title">{{ $menu->name }}</h5>
                                <p class="card-text">{{ $menu->description }}</p>
                                <p class="card-text">Price: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>

                                <!-- Status ketersediaan -->
                                @if ($menu->availability)
                                    <!-- Pilihan untuk memilih menu -->
                                    <div class="form-group mt-auto">
                                        <input type="checkbox" name="hidangan[]" value="{{ $menu->id }}" data-price="{{ $menu->price }}" class="menu-checkbox">
                                        <label for="jumlah_hidangan{{ $menu->id }}">Jumlah:</label>
                                        <input type="number" name="jumlah_hidangan{{ $menu->id }}" class="form-control menu-quantity" min="1" value="1" disabled>
                                    </div>
                                @else
                                    <p class="text-danger"></p>
                                @endif
                            </div>
                            <div class="card-footer text-center">
                                <span class="badge {{ $menu->availability ? 'bg-success' : 'bg-danger' }}">
                                    {{ $menu->availability ? 'Available' : 'Not Available' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-center">Menu tidak tersedia.</p>
                </div>
            @endif
        </div>
    </form>

    <!-- Modal untuk konfirmasi pesanan -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Konfirmasi Pesanan Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="orderSummary" class="list-group mb-3">
                        <!-- Pesanan akan ditampilkan di sini -->
                    </ul>
                    <div class="d-flex justify-content-between">
                        <strong>Total Harga:</strong>
                        <span id="totalPrice">Rp 0,00</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmOrderBtn">Konfirmasi Pesanan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk menangani keranjang dan konfirmasi -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const confirmOrderBtn = document.getElementById('confirm-order-btn');
            const orderSummary = document.getElementById('orderSummary');
            const totalPriceElement = document.getElementById('totalPrice');
            const confirmOrderBtnModal = document.getElementById('confirmOrderBtn');
            const form = document.getElementById('order-form');
            
            confirmOrderBtn.addEventListener('click', function () {
                const selectedMenus = document.querySelectorAll('.menu-checkbox:checked');
                let totalPrice = 0;
                orderSummary.innerHTML = ''; // Kosongkan pesanan sebelumnya
                
                selectedMenus.forEach(menu => {
                    const menuId = menu.value;
                    const menuName = menu.closest('.card-body').querySelector('.card-title').innerText;
                    const quantity = menu.closest('.form-group').querySelector('.menu-quantity').value;
                    const price = menu.getAttribute('data-price');
                    const subtotal = price * quantity;

                    // Buat item pesanan
                    const orderItem = `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            ${menuName} (x${quantity})
                            <span>Rp ${subtotal.toLocaleString('id-ID')}</span>
                        </li>
                    `;
                    orderSummary.innerHTML += orderItem;
                    totalPrice += subtotal;
                });

                totalPriceElement.innerText = `Rp ${totalPrice.toLocaleString('id-ID')}`;
            });

            // Enable/disable quantity input based on checkbox
            document.querySelectorAll('.menu-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const quantityInput = this.closest('.form-group').querySelector('.menu-quantity');
                    if (this.checked) {
                        quantityInput.removeAttribute('disabled');
                    } else {
                        quantityInput.setAttribute('disabled', 'disabled');
                    }
                });
            });

            // Submit form when order is confirmed
            confirmOrderBtnModal.addEventListener('click', function () {
                form.submit();
            });
        });
    </script>

    <style>
        /* Untuk memastikan semua card memiliki ukuran yang sama */
        .card {
            height: 100%; /* Mengatur tinggi penuh */
        }
        .card-body {
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection