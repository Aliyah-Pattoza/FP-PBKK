<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function show(City $city)
    {
        $otherCities = City::where('id', '!=', $city->id)->get();
        return view('cities.show', compact('city', 'otherCities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:cities',
            'description' => 'nullable',
            'location' => 'required',
        ]);

        City::create($request->all());

        return redirect()->route('cities.index')->with('success', 'City added successfully');
    }

    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:cities,slug,' . $city->id,
            'description' => 'nullable',
            'location' => 'required',
        ]);

        $city->update($request->all());

        return redirect()->route('cities.index')->with('success', 'City updated successfully');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'City deleted successfully');
    }
}