<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tentative de connexion
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // Si la connexion réussit, rediriger vers la page /login ou autre page souhaitée
            return redirect()->route('login'); // Vous pouvez mettre la route vers la page de votre choix
        }

        // Si la connexion échoue, retourner à la page de connexion avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les identifiants fournis sont incorrects.',
        ]);
    }
}

