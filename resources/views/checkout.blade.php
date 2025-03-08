<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GrandTaxiGo</title>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
    
    <header class="bg-yellow-600 text-black py-12 text-center">
        <h1 class="text-5xl font-extrabold text-white">Paiement</h1>
    </header>
    
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Stripe Checkout</h2>
            <form action="{{ route('pay') }}" method="POST" id="payment-form">
                @csrf
                <div class="mb-4">
                    <label for="cardholder-name" class="block text-gray-700 font-semibold mb-2">Nom du titulaire de la carte</label>
                    <input type="text" name="cardholder-name" id="cardholder-name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Détails de la carte</label>
                    <div id="card-element" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500"></div>
                </div>
                <button type="submit" id="submit-button" class="w-full bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 transition-all">Payer</button>
            </form>
        </div>
    </div>
    
    <footer class="bg-black text-white py-4 text-center mt-8">
        <p>&copy; 2025 GrandTaxiGo. Tous droits réservés.</p>
    </footer>
    
    <script>
        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');
    
        document.getElementById('payment-form').addEventListener('submit', async function(event) {
            event.preventDefault();
    
            const { paymentMethod, error } = await stripe.createPaymentMethod('card', card);
    
            if (error) {
                alert(error.message); 
            } else {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>
    
</body>
</html>
