@extends('layouts.main')

@section('title', 'Reservation')

@section('container')
    <h1>Make a Reservation</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>

        <div class="mb-3">
            <label for="reservation_date" class="form-label">Reservation Date</label>
            <input type="datetime-local" class="form-control" id="reservation_date" name="reservation_date" required>
        </div>

        <div class="mb-3">
            <label for="number_of_people" class="form-label">Number of People</label>
            <input type="number" class="form-control" id="number_of_people" name="number_of_people" required min="1">
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Reservation</button>
    </form>
@endsection
