@extends('layouts.main')

@section('title', 'Cart')

@section('container')
    <h1>Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(empty($cart))
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $menu_id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu_id }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>Rp {{ number_format($item['price'], 2) }}</td>
                        <td>Rp {{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $menu_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        </div>
    @endif
@endsection
