@extends('layouts.main')

@section('title', 'Create Order')

@section('container')
<h1>Create Order</h1>

<form action="{{ route('order.store') }}" method="POST">
    @csrf

    <div id="menu-items">
        <div class="menu-item">
            <select name="menu_items[0][menu_id]" class="form-select">
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }} - ${{ $menu->price }}</option>
                @endforeach
            </select>
            <input type="number" name="menu_items[0][quantity]" class="form-control" placeholder="Quantity" min="1" required>
        </div>
    </div>

    <button type="button" id="add-menu-item" class="btn btn-primary mt-3">Add More Item</button>

    <button type="submit" class="btn btn-success mt-3">Submit Order</button>
</form>

<script>
    let menuItemIndex = 1;

    document.getElementById('add-menu-item').addEventListener('click', function() {
        const menuItemsDiv = document.getElementById('menu-items');
        const newMenuItem = document.createElement('div');
        newMenuItem.classList.add('menu-item', 'mt-3');
        newMenuItem.innerHTML = `
            <select name="menu_items[${menuItemIndex}][menu_id]" class="form-select">
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }} - ${{ $menu->price }}</option>
                @endforeach
            </select>
            <input type="number" name="menu_items[${menuItemIndex}][quantity]" class="form-control" placeholder="Quantity" min="1" required>
        `;
        menuItemsDiv.appendChild(newMenuItem);
        menuItemIndex++;
    });
</script>
@endsection
