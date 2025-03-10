<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchList</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-indigo-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">WatchList</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="/" class="hover:text-indigo-300">Accueil</a></li>
                    <li><a href="/inscription" class="hover:text-indigo-300">inscription</a></li>
                    <li><a href="/connexion" class="hover:text-indigo-300">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 flex-1">
        @yield('content') <!-- Contenu spécifique aux pages -->
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 w-full mt-auto">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 WatchList. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
