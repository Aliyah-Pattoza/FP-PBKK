<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardMenuController extends Controller
{
    // Tampilkan semua menu di halaman dashboard
    public function index()
    {
        
        $menus = Menu::all();
        return view('dashboard.menu.index', compact('menus'));
    }

    // Form untuk menambah menu baru
    public function create()
    {
        return view('dashboard.menu.create');
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

        Menu::create($validatedData);

        return redirect('/dashboard/menu')->with('success', 'Menu item added successfully.');
    }

    // Form untuk edit menu
    public function edit(Menu $menu)
    {
        return view('dashboard.menu.edit', compact('menu'));
    }

    // Update data menu di database
    public function update(Request $request, Menu $menu)
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
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect('/dashboard/menu')->with('success', 'Menu item deleted successfully.');
    }
}