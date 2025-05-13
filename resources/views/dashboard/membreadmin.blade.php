@extends('layout')

@section('content')
    <div class="max-w-4xl w-full mx-auto p-6">
        <h1 class="text-2xl font-semibold text-indigo-600 mb-4">Bienvenue sur ton profil {{ Auth::user()->firstname }} !</h1>
    
        @if(auth()->check() && (auth()->user()->id_role === 1 || auth()->user()->id_role === 3))
    <div class="mb-4">
        <a href="{{ route('media.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            Ajouter un média
        </a>
    </div>
@endif

<a href="{{ route('liste-privee.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500"> Ma liste privée de médias</a>
    
    </div>
@endsection
