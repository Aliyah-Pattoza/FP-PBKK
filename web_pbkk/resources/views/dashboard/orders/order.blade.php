@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-4">
        <h2>Your Orders</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->isEmpty())
            <p>No orders found.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Items</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>Rp {{ number_format($order->total_price, 2) }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>
                                <ul>
                                    @foreach($order->items as $item)
                                        <li>{{ $item->menu->name }} (x{{ $item->quantity }}) - Rp {{ number_format($item->price, 2) }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
