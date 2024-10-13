<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // You can return an admin view, or any admin-related data
        return view('admin.dashboard');
    }
}
