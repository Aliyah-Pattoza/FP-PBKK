<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all(); 
        return view('dashboard.reservations.index', compact('reservations'));
    }

    public function edit(Reservation $reservation)
    {
        return view('dashboard.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $reservation->update($validatedData);

        return redirect('/dashboard/reservations')->with('success', 'Reservation status updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect('/dashboard/reservations')->with('success', 'Reservation deleted successfully.');
    }
}