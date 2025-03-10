<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ConnexionController extends Controller
{
    public function formulaire() {
        return view('connexion');
    }
    public function traitement() {

        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        return 'Traitement du formulaire de connexion';
    }
}
