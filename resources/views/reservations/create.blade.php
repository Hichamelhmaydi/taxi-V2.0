@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réserver un taxi - GrandTaxiGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
    <!-- Header -->
    <header class="bg-yellow-600 text-black py-12 text-center">
        <h1 class="text-5xl font-extrabold text-white">Réserver un taxi</h1>
    </header>
    <!-- Main Content -->
    <main class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Réservez votre trajet</h2>
            <form method="POST" action="{{ route('reservation.store') }}">
                @csrf
                <input type="hidden" name="chauffeur_id" value="{{ $chauffeur->id }}">

                <div class="mb-4">
                    <label for="lieu_depart" class="block text-gray-700 font-semibold mb-2">Lieu de départ</label>
                    <input type="text" name="lieu_depart" id="lieu_depart" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-4">
                    <label for="lieu_arrivee" class="block text-gray-700 font-semibold mb-2">Lieu d'arrivée</label>
                    <input type="text" name="lieu_arrivee" id="lieu_arrivee" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-4">
                    <label for="date_heure_depart" class="block text-gray-700 font-semibold mb-2">Date et heure de départ</label>
                    <input type="datetime-local" name="date_heure_depart" id="date_heure_depart" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <button type="submit" class="w-full bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 transition-all">Confirmer la réservation</button>
            </form>
        </div>
    </main>
    <!-- Footer -->
    <footer class="bg-black text-white py-4 text-center mt-8">
        <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
    </footer>

</body>
</html>
@endsection
