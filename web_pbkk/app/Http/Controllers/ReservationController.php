<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'reservation_date' => 'required|date',
            'number_of_people' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        Reservation::create($validatedData);

        return redirect('/reservation')->with('success', 'Reservation request submitted successfully.');
    }

    public function index()
    {
        // Mengambil semua pesanan pengguna yang sedang login
        $reservations = Reservation::where('name', Auth::user()->name)->get();
        return view('reservation.index', compact('reservations'));
    }
}