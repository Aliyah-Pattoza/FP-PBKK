@extends('layouts.main')

@section('title', 'Vehicles')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <h1>Daftar Kendaraan</h1>

        <!-- Filter berdasarkan status -->
        <form action="{{ route('vehicles.index') }}" method="GET">
            <div class="form-group">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                    <option value="maintenance" {{ request('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
        </form>

        <!-- Tabel daftar kendaraan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Capacity</th>
                    <th>Plate Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->model }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ $vehicle->capacity }}</td>
                        <td>{{ $vehicle->plate_number }}</td>
                        <td>{{ ucfirst($vehicle->status) }}</td>
                        <td>
                            <a href="{{ route('vehicles.show', $vehicle->slug) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Menampilkan pesan jika tidak ada kendaraan -->
        @if($vehicles->isEmpty())
            <p class="text-center">No vehicles found.</p>
        @endif
    </div>
</div>
@endsection
