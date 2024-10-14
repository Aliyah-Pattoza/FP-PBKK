@extends('main')

@section('title', 'Add/Edit Destination')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ isset($destination) ? 'Edit' : 'Add' }} Destination</h1>
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
                        <strong class="card-title">{{ isset($destination) ? 'Edit' : 'Add' }} Destination</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($destination) ? route('destinations.update', $destination->id) : route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($destination))
                                @method('PUT')
                            @endif
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ isset($destination) ? $destination->name : '' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ isset($destination) ? $destination->description : '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" value="{{ isset($destination) ? $destination->location : '' }}" required>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                                @if(isset($destination) && $destination->image)
                                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" width="100">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($destination) ? 'Update' : 'Add' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
