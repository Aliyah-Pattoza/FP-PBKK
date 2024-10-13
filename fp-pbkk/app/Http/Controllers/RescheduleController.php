<?php

namespace App\Http\Controllers;

use App\Models\Reschedule;
use Illuminate\Http\Request;

class RescheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reschedules = Reschedule::all();
        return response()->json($reschedules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'old_travel_date' => 'required|date',
            'new_travel_date' => 'required|date',
            'reason' => 'required|string|max:50',
        ]);

        $reschedule = Reschedule::create($validated);

        return response()->json([
            'message' => 'Reschedule created successfully!',
            'reschedule' => $reschedule
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reschedule = Reschedule::find($id);

        if (!$reschedule) {
            return response()->json(['message' => 'Reschedule not found'], 404);
        }

        return response()->json($reschedule);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'old_travel_date' => 'sometimes|date',
            'new_travel_date' => 'sometimes|date',
            'reason' => 'sometimes|string|max:50',
        ]);

        $reschedule = Reschedule::find($id);

        if (!$reschedule) {
            return response()->json(['message' => 'Reschedule not found'], 404);
        }

        $reschedule->update($validated);

        return response()->json([
            'message' => 'Reschedule updated successfully!',
            'reschedule' => $reschedule
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reschedule = Reschedule::find($id);

        if (!$reschedule) {
            return response()->json(['message' => 'Reschedule not found'], 404);
        }

        $reschedule->delete();

        return response()->json(['message' => 'Reschedule deleted successfully']);
    }
}
