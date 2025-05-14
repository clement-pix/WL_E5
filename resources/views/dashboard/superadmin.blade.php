@extends('layout')

@section('content')

    {{-- Conteneur principal avec largeur maximale définie et centrée --}}
    <div class="max-w-4xl w-full mx-auto p-6">

        {{-- Titre de bienvenue avec le prénom de l'utilisateur connecté --}}
        <h1 class="text-2xl font-semibold text-indigo-600 mb-4">
            Bienvenue sur ton profil {{ Auth::user()->firstname }} !
        </h1>

        {{-- Vérifie que l'utilisateur est connecté ET est superadmin (1) ou membreadmin (3) --}}
        @if(auth()->check() && (auth()->user()->id_role === 1 || auth()->user()->id_role === 3))
            <div class="mb-4 flex gap-4">
                {{-- Lien vers le formulaire de création de média --}}
                <a href="{{ route('media.create') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                    Ajouter un média
                </a>

                {{-- Lien vers la page de suppression (liste des médias) --}}
                <a href="{{ route('media.index') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                    Supprimer un média
                </a>
            </div>
        @endif

        {{-- Si l'utilisateur est un superadmin uniquement (id_role === 1) --}}
        @if(auth()->check() && auth()->user()->id_role === 1)
            <div class="mb-4">
                {{-- Lien vers la liste de gestion des utilisateurs --}}
                <a href="{{ route('users.index') }}"
                   class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                    Liste des utilisateurs
                </a>
            </div>
        @endif

        {{-- Lien accessible à tous : vers la liste privée de médias --}}
        <a href="{{ route('liste-privee.index') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            Ma liste privée de médias
        </a>

    </div>

@endsection