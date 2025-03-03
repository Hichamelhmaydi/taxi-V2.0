<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrandTaxiGo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Bienvenue sur GrandTaxiGo</h1>
        <p>Choisissez votre mode de connexion</p>
        
        <div class="mt-4">
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">S'inscrire comme passager ou chauffeur</a>
            <a href="{{ route('admin.login') }}" class="btn btn-danger btn-lg">Connexion Administrateur</a>
        </div>
    </div>
</body>
</html>
