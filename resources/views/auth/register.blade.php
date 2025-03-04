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
            <div class="text-center mt-4">
                <a href="{{ route('auth.google') }}" class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 transition-all flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.766 12.274c0-.79-.07-1.55-.204-2.285H12v4.326h6.628c-.303 1.504-1.205 2.77-2.587 3.627v3.002h4.16c2.446-2.256 3.863-5.573 3.863-9.67z"/>
                        <path d="M12 24c3.243 0 5.96-1.08 7.95-2.923l-3.863-3.003c-1.08.723-2.46 1.15-4.087 1.15-3.147 0-5.813-2.124-6.767-4.98H.35v3.065C2.346 20.585 6.83 24 12 24z"/>
                        <path d="M5.233 14.24A7.69 7.69 0 0 1 4.77 12c0-.78.13-1.54.367-2.24V6.694H.35A11.95 11.95 0 0 0 0 12c0 1.88.44 3.655 1.233 5.24l4-3z"/>
                        <path d="M12 4.78c1.74 0 3.3.6 4.54 1.77l3.39-3.39C17.96 1.08 15.243 0 12 0 6.83 0 2.346 3.415.35 8.066l4.786 3.066C5.187 7.25 8.853 4.78 12 4.78z"/>
                    </svg>
                    S'inscrire avec Google
                </a>
            </div>
            
        </form>
    </div>
</div>
<footer class="bg-black text-white py-4 text-center mt-8">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>
</body>
</html>