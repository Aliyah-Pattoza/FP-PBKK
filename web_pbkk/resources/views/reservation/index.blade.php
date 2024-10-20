@extends('layouts.main')

@section('title', 'Reservation History')

@section('container')
    <a href="{{ route('reservation.create') }}" class="btn btn-success mb-4">Buat Reservasi</a>

    <h1>Riwayat Reservasi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Reservation Date</th>
                <th>Number of People</th>
                <th>Notes</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d M Y H:i') }}</td>
                    <td>{{ $reservation->number_of_people }}</td>
                    <td>{{ $reservation->notes }}</td>
                    <td>{{ ucfirst($reservation->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No reservations found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
