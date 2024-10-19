<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category', 'all');

        $menus = $category === 'all' 
            ? Menu::all() 
            : Menu::where('category', $category)->get();

        return view('menu.index', [
            'menus' => $menus,
            'category' => $category,
            'title' => 'Menu'
        ]);
    }

    public function menu() {
        return view('menu.index', ['title' => 'Menu']);
    }
}
