@extends('dashboard.layouts.main')

@section('container')
    <h1 class="my-4">Add New Menu</h1>

    <form action="{{ route('dashboard.menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Menu Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required value="{{ old('price') }}">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                <option value="drink">Drink</option>
                <option value="food">Food</option>
                <option value="dessert">Dessert</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Menu Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Add Menu</button>
    </form>
@endsection
