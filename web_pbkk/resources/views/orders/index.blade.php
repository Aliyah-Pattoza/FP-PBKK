@extends('layouts.main')

@section('title', 'Pemesanan')

@section('container')
    <!-- Tampilkan pesan sukses atau error -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h1>Riwayat Pemesanan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Total Price</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Detail Menu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <!-- Detail Menu yang dipesan -->
                        <ul>
                            @foreach($order->items as $item)
                                <li>
                                    {{ $item->menu->name }} - {{ $item->quantity }} x Rp. {{ number_format($item->price, 0, ',', '.') }} = Rp. {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @if($order->status == 'pending')
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                            </form>
                        @else
                            <span class="text-muted">No Action</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
