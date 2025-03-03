<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - GrandTaxiGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

<!-- Header -->
<header class="bg-yellow-600 text-black py-6 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-3xl font-bold text-white">GrandTaxiGo - Admin</h1>
        <nav>
            <a href="{{ route('admin.logout') }}" class="text-white text-lg hover:text-gray-200">Déconnexion</a>
        </nav>
    </div>
</header>

<!-- Main Content -->
<main class="container mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>
    <p class="text-lg text-gray-700">Bienvenue, <span class="font-semibold text-yellow-600">{{ auth()->guard('admin')->user()->name }}</span>!</p>
</main>

<!-- Footer -->
<footer class="bg-black text-white text-center py-4 mt-10">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>

</body>
</html>
