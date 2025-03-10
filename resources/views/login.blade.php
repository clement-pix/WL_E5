@extends('layout')

@section('content')
    <div class="max-w-xs w-full bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Bienvenue</h2>
        
        <p class="text-center text-gray-700">
            Vous êtes maintenant connecté !
        </p>
        
        <div class="flex items-center justify-center mt-6">
            <a href="{{ route('dashboard') }}" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-full text-center">
                Aller au Dashboard
            </a>
        </div>

        <!-- Lien pour se déconnecter -->
    </div>
@endsection
