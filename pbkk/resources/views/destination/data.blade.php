@extends('main')

@section('title', 'Destinations')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Destination</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">List of Destinations</strong>
                        <a href="{{ route('destinations.create') }}" class="btn btn-primary float-right">+ Add New Destination</a>
                    </div>
                    <div class="card-body">
                        @if($destinations->isEmpty())
                            <p>No destinations available at the moment.</p>
                        @else
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($destinations as $destination)
                                    <tr>
                                        <td>{{ $destination->name }}</td>
                                        <td>{{ $destination->description }}</td>
                                        <td>{{ $destination->location }}</td>
                                        <td>
                                            @if($destination->image)
                                                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" width="100">
                                            @else
                                                <p>No image available</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection