@extends('layouts.main')

@section('title', 'Cities')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{ route('cities.create') }}" class="btn btn-success">Add New City</a>
            </div>
            @foreach($cities as $city)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $city->name }}</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ $city->description }}</p>
                            <a href="{{ route('cities.show', $city->id) }}" class="btn btn-primary">View City</a>
                            <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
