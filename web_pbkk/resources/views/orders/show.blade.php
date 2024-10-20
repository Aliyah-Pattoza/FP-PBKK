@extends('layouts.main')

@section('title', 'Order Detail')

@section('container')
<h1>Order #{{ $order->id }}</h1>

<p>Status: {{ ucfirst($order->status) }}</p>
<p>Total Price: ${{ $order->total_price }}</p>

<h3>Order Items</h3>
<table class="table">
    <thead>
        <tr>
            <th>Menu</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->menu->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
