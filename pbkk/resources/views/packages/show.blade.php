@extends('layouts.main')

@section('title', 'Vehicle Details')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <h1>{{ $vehicle->brand }} {{ $vehicle->model }}</h1>
        <p>Type: {{ $vehicle->type }}</p>
        <p>Capacity: {{ $vehicle->capacity }} seats</p>
        <p>Plate Number: {{ $vehicle->plate_number }}</p>
        <p>Status: {{ ucfirst($vehicle->status) }}</p>
    </div>
</div>
@endsection
