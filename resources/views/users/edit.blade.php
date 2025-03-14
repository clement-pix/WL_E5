@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">

<div class="self-start mb-6">
        <a href="{{ url()->previous() }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            &larr; Retour
        </a>
    </div>  
    <h1 class="text-3xl font-bold text-center mb-6">Modifier l'Utilisateur</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="mt-2 p-3 border border-gray-300 rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="firstname" class="block text-sm font-medium text-gray-700">Prénom :</label>
            <input type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" class="mt-2 p-3 border border-gray-300 rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Rôle :</label>
            <select name="role" id="role" class="mt-2 p-3 border border-gray-300 rounded-md w-full">
                <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                <option value="membreadmin" {{ $user->role === 'membreadmin' ? 'selected' : '' }}>MembreAdmin</option>
                <option value="membre" {{ $user->role === 'membre' ? 'selected' : '' }}>Membre</option>
            </select>
        </div>

        <button type="submit" class="block w-full py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Enregistrer
        </button>
    </form>
</div>
@endsection
