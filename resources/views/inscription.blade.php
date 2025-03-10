@extends('layout')

@section('content')
<br>
<div class="max-w-xs w-full bg-white p-6 rounded-lg shadow-md"> <!-- Changement ici à max-w-xs pour un formulaire plus petit -->
            <h2 class="text-2xl font-semibold text-center text-indigo-600 mb-6">Inscription</h2>
            
            <form action="/inscription" method="POST">
                @csrf  <!-- Le token CSRF -->

                <!-- Champ Nom -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="name" name="name" placeholder="Nom" value="{{ old('name') }}" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <!-- Champ Pseudo -->
                <div class="mb-6">
                    <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" value="{{ old('pseudo') }}" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Champ Email -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @if($errors->has('email'))
                        <p class="text-red-500">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <!-- Champ Vérification Email -->
                <div class="mb-6">
                    <label for="email_verif" class="block text-sm font-medium text-gray-700">Vérification de l'email</label>
                    <input type="email" id="email_verif" name="email_verif" placeholder="Email de vérification" value="{{ old('email_verif') }}" class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @if($errors->has('email_verif'))
                        <p class="text-red-500">{{ $errors->first('email_verif') }}</p>
                    @endif
                </div>
                <!-- Champ Mot de Passe -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">

                </div>

                <!-- Champ Confirmation Mot de Passe -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmation du mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe" value="{{ old('password_confirmation') }}" required class="mt-2 p-3 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @if ($errors->has('password'))
                        <p class="text-red-500">{{ $errors->first('password') }}</p>
                    @endif
                    @if ($errors->has('password_confirmation'))
                        <p class="text-red-500">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>
                <br>
                <!-- Bouton de Soumission -->
                <div class="flex items-center justify-center">
                    <input type="submit" value="M'inscrire" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 w-full">
                </div>
            </form>
        </div>
@endsection
