@extends('layouts.main')

@section('title', 'Edit Package')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong>Edit Package</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('packages.update', $package->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Package Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $package->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start_city_id">Start City</label>
                        <select name="start_city_id" id="start_city_id" class="form-control" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $city->id == $package->start_city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destination_city_id">Destination City</label>
                        <select name="destination_city_id" id="destination_city_id" class="form-control" required>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $city->id == $package->destination_city_id ? 'selected' : '' }}>{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $package->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle_id">Vehicle</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{ $vehicle->id == $package->vehicle_id ? 'selected' : '' }}>
                                    {{ $vehicle->brand }} {{ $vehicle->model }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
