@extends('layouts.main')

@section('title', 'City Details')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <h4>{{ $city->name }}</h4>
            </div>
            <div class="card-body">
                <p>{{ $city->description }}</p>
                <p>Location: {{ $city->location }}</p>

                <h5>Other Cities</h5>
                <ul>
                    @foreach($otherCities as $otherCity)
                        <li><a href="{{ route('cities.show', $otherCity->id) }}">{{ $otherCity->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection