<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - GrandTaxiGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

<!-- Header -->
<header class="bg-yellow-600 text-black py-12 text-center">
    <h1 class="text-5xl font-extrabold text-white">Connexion</h1>
</header>

<!-- Login Form -->
<main class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Connectez-vous à votre compte</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Adresse e-mail</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Entrez votre email" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="w-full bg-yellow-600 text-black py-2 rounded-lg text-lg font-semibold hover:bg-yellow-700 transition-all">Connexion</button>
        </form>
        <p class="mt-4 text-center text-gray-600">Pas encore inscrit ? <a href="{{ route('register') }}" class="text-yellow-600 hover:underline">Créez un compte</a></p>
    </div>
</main>

<!-- Footer -->
<footer class="bg-black text-white py-4 text-center mt-8">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>

</body>
</html>