@extends('layout')

@section('content')
<div class="container mx-auto px-2 py-8">
    <!-- Bouton retour -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            &larr; Retour
        </a>
    </div>

    <!-- Bloc d'édition de l'avis -->
    <div class="bg-white p-6 rounded shadow-md">
        <h1 class="text-3xl font-bold text-center mb-4">Modifier votre avis</h1>
        <form action="{{ route('comment.update', $avis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Sélection de la note -->
            <div class="mb-4">
                <label for="note" class="block mb-2 font-bold">Votre note (sur 5)</label>
                <select name="note" id="note" class="w-full border border-gray-300 rounded p-2">
                    <option value="">-- Choisir une note --</option>
                    <option value="1" {{ $avis->note == 1 ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $avis->note == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $avis->note == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $avis->note == 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $avis->note == 5 ? 'selected' : '' }}>5</option>
                </select>
            </div>
            <!-- Zone de texte pour le commentaire -->
            <div class="mb-4">
                <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 rounded p-2" placeholder="Votre commentaire ici...">{{ $avis->commentaire }}</textarea>
            </div>
            <!-- Bouton d'envoi -->
            <div class="text-center">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">Modifier</button>
            </div>
        </form>
    </div>
</div>
@endsection