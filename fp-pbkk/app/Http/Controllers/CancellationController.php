<?php

namespace App\Http\Controllers;

use App\Models\Cancellation;
use Illuminate\Http\Request;

class CancellationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cancellations = Cancellation::all();
        return response()->json($cancellations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reason' => 'required|string|max:50',
        ]);

        $cancellation = Cancellation::create($validated);

        return response()->json([
            'message' => 'Cancellation created successfully!',
            'cancellation' => $cancellation
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cancellation = Cancellation::find($id);

        if (!$cancellation) {
            return response()->json(['message' => 'Cancellation not found'], 404);
        }

        return response()->json($cancellation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'reason' => 'sometimes|string|max:50',
        ]);

        $cancellation = Cancellation::find($id);

        if (!$cancellation) {
            return response()->json(['message' => 'Cancellation not found'], 404);
        }

        $cancellation->update($validated);

        return response()->json([
            'message' => 'Cancellation updated successfully!',
            'cancellation' => $cancellation
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cancellation = Cancellation::find($id);

        if (!$cancellation) {
            return response()->json(['message' => 'Cancellation not found'], 404);
        }

        $cancellation->delete();

        return response()->json(['message' => 'Cancellation deleted successfully']);
    }
}
