<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

<!-- Header -->
<header class="bg-yellow-600 text-black py-6 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-3xl font-bold text-white">Dashboard</h1>
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
           class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
            Déconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto mt-12 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Bienvenue, {{ auth()->user()->name }} !</h2>
    <p class="text-gray-600">Vous êtes connecté à votre tableau de bord.</p>
</main>

<!-- Footer -->
<footer class="bg-black text-white py-4 mt-12 text-center">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>

</body>
</html>