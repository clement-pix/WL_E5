<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script>
        // Redirection automatique après 3 secondes
        setTimeout(function() {
            window.location.href = "{{ route('welcome') }}"; // Redirige vers la page d'accueil (ou welcome)
        }, 3000); // 3000ms = 3 secondes
    </script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col items-center justify-center">

    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-semibold text-indigo-600 mb-4">Vous êtes déconnecté(e)</h1>
        <p class="text-gray-700">Vous allez être redirigé vers la page d'accueil dans quelques secondes...</p>
        <p class="text-indigo-600 font-bold mt-4">Merci d'avoir utilisé WatchList !</p>
    </div>

</body>
</html>
