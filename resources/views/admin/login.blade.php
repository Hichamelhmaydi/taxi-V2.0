<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - GrandTaxiGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

<!-- Header -->
<header class="bg-yellow-600 text-black py-12 relative overflow-hidden">
    <div class="container mx-auto text-center relative z-10">
        <div class="flex justify-center items-center">
            <h1 class="text-5xl font-extrabold mb-6 text-white">GrandTaxiGo - Admin</h1>
        </div>
    </div>
</header>

<!-- Login Form -->
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion Admin</h2>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Adresse Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-600" required>
            </div>
            <button type="submit" class="w-full bg-yellow-600 text-black py-2 rounded-lg text-lg font-semibold hover:bg-yellow-700 transition-all">Connexion</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-black text-white py-6 mt-16 text-center">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>

</body>
</html>