@extends('layout')

@section('content')

    {{-- Conteneur principal avec largeur limitée --}}
    <div class="max-w-4xl w-full mx-auto p-6">
        {{-- Message de bienvenue avec le prénom de l'utilisateur connecté --}}
        <h1 class="text-2xl font-semibold text-indigo-600 mb-4">
            Bienvenue sur ton profil {{ Auth::user()->firstname }} !
        </h1>
    </div>

    {{-- Lien vers la liste privée du membre --}}
    <a href="{{ route('liste-privee.index') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
        Ma liste privée de médias
    </a>

@endsection