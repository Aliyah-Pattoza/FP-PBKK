<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardMenuController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items.menu')->get(); 
        return view('dashboard.orders.index', compact('orders'));
    }

    // Simpan menu baru ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('menu-images');
        }

        Order::create($validatedData);

        return redirect('/dashboard/menu')->with('success', 'Menu item added successfully.');
    }

    // Form untuk edit menu
    public function edit(Order $menu)
    {
        return view('dashboard.menu.edit', compact('menu'));
    }

    // Update data menu di database
    public function update(Request $request, Order $menu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('menu-images');
        }

        $menu->update($validatedData);

        return redirect('/dashboard/menu')->with('success', 'Menu item updated successfully.');
    }

    // Hapus menu
    public function destroy(Order $menu)
    {
        $menu->delete();
        return redirect('/dashboard/menu')->with('success', 'Menu item deleted successfully.');
    }
}