<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all()->map(function ($package) {
            // Add a formatted_price attribute to each package for display purposes
            $package->formatted_price = 'Rp' . number_format($package->price, 2, ',', '.');
            return $package;
        });

        return view('packages.index', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_package' => 'required|string|max:255',
            'type_package' => 'required|string|max:255',
            'price' => 'required|numeric',
            'rental_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $package = Package::create($validated);

        return response()->json([
            'message' => 'Package created successfully!',
            'package' => $package
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }

        return response()->json($package);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name_package' => 'sometimes|string|max:255',
            'type_package' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'rental_date' => 'sometimes|date',
            'status' => 'sometimes|string|max:50',
        ]);

        $package = Package::find($id);

        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }

        $package->update($validated);

        return response()->json([
            'message' => 'Package updated successfully!',
            'package' => $package
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json(['message' => 'Package not found'], 404);
        }

        $package->delete();

        return response()->json(['message' => 'Package deleted successfully']);
    }
}
