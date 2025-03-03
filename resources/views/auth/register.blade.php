<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register - GrandTaxiGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
    <header class="bg-yellow-600 text-black py-12 text-center">
        <h1 class="text-5xl font-extrabold text-white">Register</h1>
    </header>
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Inscription</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Nom complet</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Adresse email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>
            
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-semibold mb-2">Type de compte</label>
                <select name="role" id="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    <option value="chauffeur">Chauffeur</option>
                    <option value="passager">Passager</option>
                </select>
            </div>
            
            <button type="submit" class="w-full bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 transition-all">S'inscrire</button>
        </form>
    </div>
</div>
<footer class="bg-black text-white py-4 text-center mt-8">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>
</body>
</html>