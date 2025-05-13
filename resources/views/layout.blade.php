<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchList</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <style>
    a {
        text-decoration: none !important;
        color: inherit;
    }
</style>

    <!-- Swiper CSS -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-indigo-600 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">WatchList</h1>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="/" class="no-underline text-white hover:text-indigo-300">Accueil</a></li>
                @guest
                    <li><a href="/inscription" class="text-white hover:text-indigo-300">Inscription</a></li>
                    <li><a href="/connexion" class="text-white hover:text-indigo-300">Connexion</a></li>
                @endguest

                @auth
                    <!-- Lien vers un dashboard selon le rôle -->
                    @if (auth()->user()->id_role == 1)
                        <li><a href="{{ route('dashboard.superadmin') }}" class="text-white hover:text-indigo-300">Bonjour, {{ auth()->user()->firstname }}</a></li>
                    @elseif (auth()->user()->id_role == 3)
                        <li><a href="{{ route('dashboard.membreadmin') }}" class="text-white hover:text-indigo-300">Bonjour, {{ auth()->user()->firstname }}</a></li>
                    @elseif (auth()->user()->id_role == 2)
                        <li><a href="{{ route('dashboard.membre') }}" class="text-white hover:text-indigo-300">Bonjour, {{ auth()->user()->firstname }}</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-white hover:text-indigo-300">Déconnexion</button>
                        </form>
                    </li>
                @endauth
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>
</html>

