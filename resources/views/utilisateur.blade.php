@extends('layout')

@section('content')
<h1 class="text-2xl font-bold">Liste des utilisateurs</h1>

<ul>
    @foreach($utilisateurs as $user)  <!-- Utilisation correcte de la variable -->
        <li> 
            {{ $user->email }}
        </li>
    @endforeach
</ul>
@endsection
