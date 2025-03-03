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
    @if(auth()->user()->role === 'chauffeur')
            <p id="status-text" class="mt-4 text-lg font-semibold">
                Maintenant : <span class="text-{{ auth()->user()->disponibilite ? 'green' : 'red' }}-500">
                    {{ auth()->user()->disponibilite ? 'Disponible' : 'Non Disponible' }}
                </span>
            </p>
            <button id="update-status-btn" class="px-6 py-3.5 text-base font-medium text-white bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-600 rounded-lg text-center">
                Mettre à jour statut
            </button>
    @elseif(auth()->user()->role === 'passager')
        <p class="text-green-500 mt-4">Vous êtes un passager.</p>
    @endif

</main>

<!-- Footer -->
<footer class="bg-black text-white py-4 mt-12 text-center">
    <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
</footer>

</body>
</html>


<script>
    document.getElementById('update-status-btn').addEventListener('click', function() {
        fetch("{{ route('update.status') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                let statusText = document.getElementById("status-text");
                statusText.innerHTML = `Statut: <span class="text-${data.status ? 'green' : 'red'}-500">
                    ${data.status ? 'Disponible' : 'Non Disponible'}
                </span>`;
            }
        })
        .catch(error => console.error("Erreur:", error));
    });
</script>