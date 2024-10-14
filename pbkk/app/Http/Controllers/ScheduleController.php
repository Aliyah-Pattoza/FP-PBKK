<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Package;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('package')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $packages = Package::all(); // Untuk pilihan paket di form
        return view('schedules.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'travel_date' => 'required|date',
            'slug' => 'required|unique:schedules,slug',
            'available_capacity' => 'required|integer|min:1',
        ]);

        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit(Schedule $schedule)
    {
        $packages = Package::all();
        return view('schedules.edit', compact('schedule', 'packages'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'travel_date' => 'required|date',
            'slug' => 'required|unique:schedules,slug,' . $schedule->id,
            'available_capacity' => 'required|integer|min:1',
        ]);

        $schedule->update($validated);

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}