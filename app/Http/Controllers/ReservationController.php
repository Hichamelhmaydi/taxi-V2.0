<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReservationController extends Controller
{
    public function create(User $chauffeur){
        return view('reservations.create', compact('chauffeur'));
    }

    public function store(Request $request){
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

        return redirect('checkout')->with('success', 'Votre réservation a été enregistrée avec succès!');
    }

    public function show()
    {
        $reservations = Reservation::all();
        return view('dashboard', compact('reservations'));
    }

    public function updateStatus(Request $request){
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }
        $chauffeur = Auth::user();
        $chauffeur->disponibilite = !$chauffeur->disponibilite;
        $chauffeur->save();
        return redirect()->back()->with('success', 'Statut mis à jour avec succès!');
    }
    public function accepteReservation($id)
    {
        $reservation = Reservation::findOrFail($id); 
        $reservation->statut = 'confirmée';
        $reservation->save();
        return redirect()->back()->with('success', 'Réservation acceptée avec succès!');
    }
    public function refuseReservation($id)
    {
        $reservation = Reservation::findOrFail($id); 
        $reservation->statut = 'annulée';
        $reservation->save();
        return redirect()->back()->with('success', 'Réservation refusée avec succès!');
    }
    
}
