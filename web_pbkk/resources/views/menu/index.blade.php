@extends('layouts.main')

@section('title', 'Menu')

@section('container')
    <div class="container">
        <h1 class="my-4">Our Menu</h1>

        <!-- Filter Kategori -->
        <div class="mb-4">
            <a href="{{ route('menu.index', ['category' => 'all']) }}" 
               class="btn btn-warning {{ $category == 'all' ? 'active' : '' }}">All</a>
            <a href="{{ route('menu.index', ['category' => 'drink']) }}" 
               class="btn btn-warning {{ $category == 'drink' ? 'active' : '' }}">Drinks</a>
            <a href="{{ route('menu.index', ['category' => 'food']) }}" 
               class="btn btn-warning {{ $category == 'food' ? 'active' : '' }}">Foods</a>
            <a href="{{ route('menu.index', ['category' => 'dessert']) }}" 
               class="btn btn-warning {{ $category == 'dessert' ? 'active' : '' }}">Desserts</a>
        </div>

        <!-- Menu Items -->
        <div class="row">
            @forelse ($menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $menu->image ? asset('storage/' . $menu->image) : 'https://via.placeholder.com/150' }}" 
                             class="card-img-top" 
                             alt="{{ $menu->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ $menu->description }}</p>
                            <p class="card-text"><strong>Rp {{ number_format($menu->price, 2) }}</strong></p>

                            <!-- Add to Cart Buttons -->
                            <div class="d-flex justify-content-end align-items-center">
                                @if($menu->availability)
                                    <button class="btn btn-outline-primary btn-sm" 
                                            id="plus-{{ $menu->id }}" 
                                            onclick="showQuantityInput({{ $menu->id }}, {{ $menu->price }}, '{{ $menu->name }}')">
                                        +
                                    </button>
                                    <div class="d-none" id="quantity-wrapper-{{ $menu->id }}">
                                        <button class="btn btn-outline-secondary btn-sm" 
                                                type="button" 
                                                onclick="decreaseQuantity({{ $menu->id }})">-</button>
                                        <span id="quantity-{{ $menu->id }}">1</span>
                                        <button class="btn btn-outline-secondary btn-sm" 
                                                type="button" 
                                                onclick="increaseQuantity({{ $menu->id }})">+</button>
                                    </div>
                                @else
                                    <button class="btn btn-outline-danger btn-sm" disabled>+</button>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <span class="badge {{ $menu->availability ? 'bg-success' : 'bg-danger' }}">
                                {{ $menu->availability ? 'Available' : 'Not Available' }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No items available in this category.</p>
            @endforelse
        </div>

        <!-- Floating Cart Icon -->
        <div class="floating-cart">
            <button class="btn btn-warning rounded-circle p-3" data-bs-toggle="modal" data-bs-target="#cartModal">
                <i class="bi bi-cart"></i>
            </button>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="cartItems" class="list-group mb-3">
                        <!-- Item list will be dynamically generated here -->
                    </ul>
                    <div class="d-flex justify-content-between">
                        <strong>Total Price:</strong>
                        <span id="totalPrice">Rp 0,00</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Order Now</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .floating-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        .btn-sm {
            width: 30px;
            height: 30px;
            padding: 0;
            line-height: 30px;
            text-align: center;
        }
    </style>

    <!-- Script for Quantity Increment/Decrement and Cart Handling -->
    <script>
        let cart = [];
        let totalPrice = 0;

        function showQuantityInput(menuId, price, name) {
            document.getElementById(`plus-${menuId}`).classList.add('d-none');
            document.getElementById(`quantity-wrapper-${menuId}`).classList.remove('d-none');
            
            // Add to cart
            addToCart(menuId, price, name);
        }

        function increaseQuantity(menuId) {
            const quantityElement = document.getElementById(`quantity-${menuId}`);
            quantityElement.innerText = parseInt(quantityElement.innerText) + 1;

            // Update cart
            updateCart(menuId, 1);
        }

        function decreaseQuantity(menuId) {
            const quantityElement = document.getElementById(`quantity-${menuId}`);
            const currentQuantity = parseInt(quantityElement.innerText);
            if (currentQuantity > 1) {
                quantityElement.innerText = currentQuantity - 1;

                // Update cart
                updateCart(menuId, -1);
            } else {
                document.getElementById(`plus-${menuId}`).classList.remove('d-none');
                document.getElementById(`quantity-wrapper-${menuId}`).classList.add('d-none');

                // Remove from cart
                removeFromCart(menuId);
            }
        }

        function addToCart(menuId, price, name) {
            const itemIndex = cart.findIndex(item => item.menuId === menuId);
            if (itemIndex === -1) {
                cart.push({ menuId, price, name, quantity: 1 });
            }
            updateCartDisplay();
        }

        function updateCart(menuId, change) {
            const itemIndex = cart.findIndex(item => item.menuId === menuId);
            if (itemIndex !== -1) {
                cart[itemIndex].quantity += change;
                if (cart[itemIndex].quantity <= 0) {
                    cart.splice(itemIndex, 1); 
                }
            }
            updateCartDisplay();
        }

        function removeFromCart(menuId) {
            cart = cart.filter(item => item.menuId !== menuId);
            updateCartDisplay();
        }

        function updateCartDisplay() {
            const cartItemsElement = document.getElementById('cartItems');
            cartItemsElement.innerHTML = '';
            totalPrice = 0;

            cart.forEach(item => {
                const itemTotalPrice = item.price * item.quantity;
                totalPrice += itemTotalPrice;
                
                const cartItem = `
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        ${item.name} (x${item.quantity})
                        <span>Rp ${itemTotalPrice.toFixed(2)}</span>
                    </li>
                `;
                cartItemsElement.innerHTML += cartItem;
            });

            document.getElementById('totalPrice').innerText = `Rp ${totalPrice.toFixed(2)}`;
        }
    </script>
@endsection
