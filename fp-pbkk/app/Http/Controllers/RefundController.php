<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $refunds = Refund::all();
        return response()->json($refunds);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'refund_amount' => 'required|numeric',
            'reason' => 'required|string|max:50',
        ]);

        $refund = Refund::create($validated);

        return response()->json([
            'message' => 'Refund created successfully!',
            'refund' => $refund
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $refund = Refund::find($id);

        if (!$refund) {
            return response()->json(['message' => 'Refund not found'], 404);
        }

        return response()->json($refund);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'refund_amount' => 'sometimes|numeric',
            'reason' => 'sometimes|string|max:50',
        ]);

        $refund = Refund::find($id);

        if (!$refund) {
            return response()->json(['message' => 'Refund not found'], 404);
        }

        $refund->update($validated);

        return response()->json([
            'message' => 'Refund updated successfully!',
            'refund' => $refund
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $refund = Refund::find($id);

        if (!$refund) {
            return response()->json(['message' => 'Refund not found'], 404);
        }

        $refund->delete();

        return response()->json(['message' => 'Refund deleted successfully']);
    }
}
