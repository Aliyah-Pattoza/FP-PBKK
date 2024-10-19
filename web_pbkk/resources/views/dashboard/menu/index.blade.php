@extends('dashboard.layouts.main')

@section('container')
    <h1 class="my-4">Menu Management</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('dashboard.menu.create') }}" class="btn btn-primary mb-3">Add New Menu</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->category }}</td>
                    <td>${{ $menu->price }}</td>
                    <td>
                        <a href="{{ route('dashboard.menu.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('dashboard.menu.destroy', $menu) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
