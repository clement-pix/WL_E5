@extends('layout') {{-- Hérite du layout principal --}}

@section('content')
<div class="container mx-auto py-8">
    
    {{-- Titre principal centré --}}
    <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Gestion des Médias</h2>

    {{-- Bloc du formulaire centré et stylisé --}}
    <div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
        
        {{-- Formulaire de suppression --}}
        <form action="{{ route('media.destroy', 0) }}"
              method="POST"
              onsubmit="return confirm('Supprimer ce média ?');"
              id="deleteMediaForm">
              
            @csrf {{-- Protection CSRF --}}
            @method('DELETE') {{-- Spoofing pour méthode DELETE --}}

            {{-- Label pour la liste déroulante --}}
            <label for="media_id" class="block mb-2 text-sm font-medium text-gray-700">
                Sélectionner un média à supprimer :
            </label>

            {{-- Liste déroulante des médias --}}
            <select name="media_id" id="media_id" required
                class="w-full p-2 border border-gray-300 rounded mb-4">
                <option value="">-- Choisir un média --</option>
                @foreach($medias as $media)
                    <option value="{{ $media->id_media }}">{{ $media->titre }}</option>
                @endforeach
            </select>

            {{-- Bouton de soumission --}}
            <button type="submit" class="py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Supprimer
            </button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.getElementById('deleteMediaForm').addEventListener('submit', function (e) {
        const select = document.getElementById('media_id');
        const selectedId = select.value;

        if (!selectedId) {
            e.preventDefault();
            alert("Veuillez sélectionner un média.");
        } else {
            // Remplace l’URL par celle avec l’ID du média sélectionné
            this.action = this.action.replace('/0', '/' + selectedId);
        }
    });
</script>
@endsection
