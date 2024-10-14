<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all bookings
        $bookings = Transaction::all();

        // Return a response or view with the bookings data
        return response()->json($bookings); // or return a view if you're using Blade
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'booking_date' => 'required|date',
            'travel_date' => 'required|date',
            'total_price' => 'required|numeric',
            'person_number' => 'required|integer',
        ]);

        // Create a new booking
        $booking = Transaction::create([
            'booking_date' => $validated['booking_date'],
            'travel_date' => $validated['travel_date'],
            'total_price' => $validated['total_price'],
            'person_number' => $validated['person_number'],
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Booking created successfully!',
            'booking' => $booking
        ], 201); // 201 is for resource creation success
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the booking by ID
        $booking = Transaction::find($id);
        // Pagination - 10 bookings per page, ordered by creation date
        $bookings = Transaction::orderBy('created_at', 'desc')->paginate(10);

        // Check if the booking exists
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Return the booking data
        return response()->json($booking);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'booking_date' => 'sometimes|date',
            'travel_date' => 'sometimes|date',
            'total_price' => 'sometimes|numeric',
            'person_number' => 'sometimes|integer',
        ]);

        // Find the booking by ID
        $booking = Transaction::find($id);

        // Check if the booking exists
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Update the booking with validated data
        $booking->update($validated);

        // Return a success response
        return response()->json([
            'message' => 'Booking updated successfully!',
            'booking' => $booking
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the booking by ID
        $booking = Transaction::find($id);

        // Check if the booking exists
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        // Delete the booking
        $booking->delete();

        // Return a success response
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
