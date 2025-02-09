<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

        // Show all reservations (Admin or User-specific)
        public function index()
        {
            // Eager load the livres (books) and their categories
            $reservations = Reservation::with('livres.categorie')->paginate(10);

            return view('backend.reservations.reservations', compact('reservations'));
        }


        // Show form to create a new reservation

        // Store a new reservation
        // public function store(Request $request)
        // {
        //     $request->validate([
        //         'livre_id' => 'required|exists:livres,id',
        //         'dateReservation' => 'required|date',
        //     ]);

        //     Reservation::create([
        //         'user_id' => auth()->id(),
        //         'livre_id' => $request->livre_id,
        //         'dateReservation' => $request->dateReservation,
        //         'etat' => 'en attente',
        //     ]);

        //     return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
        // }

        // Show the form to edit a reservation
        public function edit(Reservation $reservation)
        {
            $livres = Livre::all();
            return view('backend.reservations.edit', compact('reservation', 'livres'));
        }

        // Update a reservation
        public function update(Request $request, Reservation $reservation)
        {

            $request->validate([
                'livre_id' => 'required|exists:livres,id',
                'dateReservation' => 'required|date',
                'etat' => 'required|in:en attente,confirmée,annulée',
            ]);

            $reservation->update([
                'livre_id' => $request->livre_id,
                'dateReservation' => $request->dateReservation,
                'etat' => $request->etat,
            ]);

            return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
        }

        // Delete a reservation
        public function destroy(Reservation $reservation)
        { // Optional, for permission checks

            $reservation->delete();

            return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
        }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a reservation.');
        }

        $request->validate([
            'livre_id' => 'required|exists:livres,id',
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'livre_id' => $request->livre_id,
            'dateReservation' => now(),
            'etat' => 'en attente',
            'dateEmprunt' => null,
            'heureEmprunt' => null,
        ]);

        return redirect()->back()->with('success', 'Reservation request submitted successfully.');
    }


}
