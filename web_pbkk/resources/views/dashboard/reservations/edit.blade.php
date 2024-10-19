@extends('dashboard.layouts.main')

@section('container')
    <h1 class="mb-4">Edit Reservation</h1>

    <form action="{{ route('dashboard.reservations.update', $reservation) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="canceled" {{ $reservation->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
@endsection
