@extends('layout')

@section('content')

    <!-- Bouton retour sur la gauche -->
    <div class="self-start mb-6">
        <a href="{{ url()->previous() }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">
            &larr; Retour
        </a>
    </div>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    @if(auth()->check() && (auth()->user()->id_role === 1 || auth()->user()->id_role === 3))
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Ajouter un Média</h2>

            <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label for="titre" class="block text-sm font-medium text-gray-700">Titre :</label>
                    <input type="text" name="titre" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
                    <textarea name="description" required rows="3" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image :</label>
                    <input type="file" name="image" accept="image/*" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-6">
                    <label for="id_categorie" class="block text-sm font-medium text-gray-700">Catégorie :</label>
                    <select name="id_categorie" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id_categorie }}">{{ $categorie->type }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="block w-full py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Ajouter
                </button>
            </form>
        </div>
    @else
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md text-center">
            <p class="text-xl text-red-600 font-bold">Accès refusé</p>
            <p class="mt-2">Vous n'avez pas les autorisations nécessaires pour ajouter un média.</p>
        </div>
    @endif
</div>
@endsection
