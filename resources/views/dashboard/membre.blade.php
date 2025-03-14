@extends('layout')

@section('content')
    <div class="max-w-4xl w-full mx-auto p-6">
        <h1 class="text-2xl font-semibold text-indigo-600 mb-4">Bienvenue sur ton profil {{ Auth::user()->firstname }} !</h1>
    </div>
@endsection
