@extends('layout')

@section('content')
<br>
<div class="max-w-xs w-full bg-white p-6 rounded-lg shadow-md"> <!-- Changement ici à max-w-xs pour un formulaire plus petit -->
            <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Connexion</h2>
            
            <form action="/connexion" method="post">
                @csrf  <!-- Le token CSRF -->

                <!-- Champ Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @if($errors->has('email'))
                        <p class="text-red-500">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Champ Mot de Passe -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @if($errors->has('password'))
                        <p class="text-red-500">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <br>
                <!-- Bouton de Soumission -->
                <div class="flex items-center justify-center">
                    <input type="submit" value="Se connecter" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-full">
                </div>
            </form>
        </div>
@endsection
