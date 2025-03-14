@extends('layout')

@section('content')
<div class="container mx-auto px-2 py-8">
    <!-- Bouton retour -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            &larr; Retour
        </a>
    </div>

    <!-- Bloc de détails du média -->
    <div class="bg-white p-6 rounded shadow-md">
        <!-- Titre du film -->
        <h1 class="text-3xl font-bold text-center mb-4">{{ $media->titre }}</h1>

        <!-- Image plus grande -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset($media->lien_image) }}" alt="{{ $media->titre }}" class="rounded" style="height: 400px; object-fit: cover;">
        </div>

        <!-- Description du média -->
        <div class="mx-auto max-w-3xl px-8">
            <p class="text-lg mb-6 text-justify">{{ $media->description }}</p>
        </div>

<!-- Affichage des avis et commentaires -->
<div class="mx-auto max-w-3xl px-8 mt-8">
    <h2 class="text-xl font-bold mb-4 text-center">Avis et commentaires</h2>
    @if($media->avis->isEmpty())
        <p class="text-center">Aucun avis pour ce média.</p>
    @else
        @foreach($media->avis as $avis)
            <div class="border p-4 rounded mb-4">
                <p class="font-bold">
                    Note :
                    @for ($i = 1; $i <= 5; $i++)
                        @if($i <= $avis->note)
                        <span style="color: #F59E0B;">★</span>
                        @else
                            <span class="text-gray-300">★</span>
                        @endif
                    @endfor
                </p>
                <p class="mt-2 text-sm text-gray-600">
                    De : {{ $avis->membre->pseudo ?? 'Utilisateur inconnu' }}
                </p>
                <p class="mt-2">{{ $avis->commentaire }}</p>

            @if(auth()->check() && auth()->id() == $avis->id)
                <a href="{{ route('comment.edit', $avis->id) }}" class="text-indigo-600 hover:underline mt-2 block">
                    Modifier mon avis
                </a>
            @endif
            </div>
        @endforeach
    @endif
</div>


        <!-- Formulaire d'ajout de commentaire et avis -->
@auth
    @if(!$alreadyCommented)
        <div class="mx-auto max-w-3xl px-8 mt-8">
            <h2 class="text-xl font-bold mb-4 text-center">Ajouter un commentaire et une note</h2>
            <form action="{{ route('comment.store', $media->id_media) }}" method="POST">
                @csrf
                <!-- Sélection de la note -->
                <div class="mb-4">
                    <label for="note" class="block mb-2 font-bold">Votre note (sur 5)</label>
                    <select name="note" id="note" class="w-full border border-gray-300 rounded p-2">
                        <option value="">-- Choisir une note --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <!-- Zone de texte pour le commentaire -->
                <div class="mb-4">
                    <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 rounded p-2" placeholder="Votre commentaire ici..."></textarea>
                </div>
                <!-- Bouton d'envoi -->
                <div class="text-center">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    @else
        <div class="mx-auto max-w-3xl px-8 mt-8">
            <p class="text-center text-gray-600">Vous avez déjà laissé un avis sur ce média.</p>
        </div>
    @endif
@else
    <div class="mx-auto max-w-3xl px-8 mt-8">
        <p class="text-center">
            Veuillez <a href="/connexion" class="text-indigo-600 hover:underline">vous connecter</a> pour ajouter un commentaire.
        </p>
    </div>
@endauth

    </div>
</div>
@endsection
