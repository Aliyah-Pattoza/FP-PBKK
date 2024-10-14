<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter status dari request, jika ada
        $status = $request->query('status');
        
        // Filter kendaraan berdasarkan status jika ada
        if ($status) {
            $vehicles = Vehicle::where('status', $status)->get();
        } else {
            $vehicles = Vehicle::all();
        }
        
        return view('vehicles.index', compact('vehicles', 'status'));
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }
}
