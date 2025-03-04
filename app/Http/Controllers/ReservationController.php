<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(User $chauffeur)
    {
        return view('reservations.create', compact('chauffeur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'chauffeur_id' => 'required|exists:users,id',
            'lieu_depart' => 'required|string',
            'lieu_arrivee' => 'required|string',
            'date_heure_depart' => 'required|date',
        ]);

        Reservation::create([
            'passager_id' => Auth::id(),
            'chauffeur_id' => $request->chauffeur_id,
            'lieu_depart' => $request->lieu_depart,
            'lieu_arrivee' => $request->lieu_arrivee,
            'date_heure_depart' => $request->date_heure_depart,
            'statut' => 'en_attente',
        ]);

        return redirect('/')->with('success', 'Votre réservation a été enregistrée avec succès!');
    }
}
