@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-4">Manage Reservations</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Reservation Date</th>
                <th>People</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->phone_number }}</td>
                    <td>{{ $reservation->reservation_date }}</td>
                    <td>{{ $reservation->number_of_people }}</td>
                    <td>{{ ucfirst($reservation->status) }}</td>
                    <td>
                        <a href="{{ route('dashboard.reservations.edit', $reservation) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('dashboard.reservations.destroy', $reservation) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
