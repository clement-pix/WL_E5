@extends('layout')

@section('content')
<div class="max-w-xs w-full bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Ajouter un Média</h2>

    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: auto;">
        @csrf
        
        <div class="mb-6">
            <label for="titre" class="block text-sm font-medium text-gray-700">Titre :</label>
            <input type="text" name="titre" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-sm font-medium text-gray-700">Description :</label>
            <textarea name="description" rows="3" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
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

        <button type="submit" style="display: block; width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer;">
            Ajouter
        </button>
    </form>
</div>
@endsection
