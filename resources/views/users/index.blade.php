@extends('layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Bouton Retour -->
    <div class="self-start mb-6">
        <a href="{{ route('dashboard') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            &larr; Retour
        </a>
    </div>

    <h1 class="text-3xl font-bold text-center mb-6">Liste des Utilisateurs</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Nom</th>
                <th class="py-2 px-4 border">Prénom</th>
                <th class="py-2 px-4 border">Pseudo</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Rôle</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="text-center">
                <td class="py-2 px-4 border">{{ $user->name }}</td>
                <td class="py-2 px-4 border">{{ $user->firstname }}</td>
                <td class="py-2 px-4 border">{{ $user->pseudo }}</td>
                <td class="py-2 px-4 border">{{ $user->email }}</td>
                <td class="py-2 px-4 border">{{ $user->id_role }}</td>
                <td class="py-2 px-4 border">
                    <div class="flex justify-center gap-8">
                        <!-- Bouton Modifier -->
                        <a href="{{ route('users.edit', $user->id) }}" 
                           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                            Modifier
                        </a>
                        <!-- Bouton Supprimer -->
                        <form action="{{ route('users.destroy', $user->id) }}" 
                              method="POST"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
