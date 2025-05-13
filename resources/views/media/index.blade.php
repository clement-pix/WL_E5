@extends('layout')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Gestion des Médias</h2>

    <div class="bg-white p-6 rounded shadow max-w-xl mx-auto">
        <form action="{{ route('media.destroy', 0) }}" method="POST" onsubmit="return confirm('Supprimer ce média ?');" id="deleteMediaForm">
            @csrf
            @method('DELETE')

            <label for="media_id" class="block mb-2 text-sm font-medium text-gray-700">
                Sélectionner un média à supprimer :
            </label>

            <select name="media_id" id="media_id" required class="w-full p-2 border border-gray-300 rounded mb-4">
                <option value="">-- Choisir un média --</option>
                @foreach($medias as $media)
                    <option value="{{ $media->id_media }}">{{ $media->titre }}</option>
                @endforeach
            </select>

            <button type="submit" class=" py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700">
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
            this.action = this.action.replace('/0', '/' + selectedId);
        }
    });
</script>
@endsection

