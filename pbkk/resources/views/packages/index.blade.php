@extends('layouts.main')

@section('title', 'Packages')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Paket</h1>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Start City</th>
                        <th>Destination City</th>
                        <th>Price</th>
                        <th>Vehicle</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $key => $package)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->startCity->name }}</td>
                        <td>{{ $package->destinationCity->name }}</td>
                        <td>${{ number_format($package->price, 2) }}</td>
                        <td>{{ $package->vehicle->brand }} {{ $package->vehicle->model }}</td>
                        <td>
                            <a href="{{ route('packages.show', $package->slug) }}" class="btn btn-info">View</a>
                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>                
            </table>
        </div>
    </div>
</div>
@endsection
