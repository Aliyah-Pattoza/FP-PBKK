<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Vehicle;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with(['startCity', 'destinationCity', 'vehicle'])->get();
        return view('packages.index', compact('packages'));
    }

    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    public function create()
    {
        $cities = City::all();
        $vehicles = Vehicle::all();
        return view('packages.create', compact('cities', 'vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }

    public function edit(Package $package)
    {
        $cities = City::all();
        $vehicles = Vehicle::all();
        return view('packages.edit', compact('package', 'cities', 'vehicles'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|exists:vehicles,id',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')->with('success', 'Package updated successfully!');
    }
}