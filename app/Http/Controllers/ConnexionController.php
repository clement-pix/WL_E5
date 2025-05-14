<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function formulaire()
    {
        // Affiche la vue "connexion.blade.php"
        return view('connexion');
    }

    /**
     * Traite les données envoyées par le formulaire de connexion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function traitement(Request $request)
    {
        // Valide les champs envoyés dans le formulaire
        $request->validate([
            'email' => ['required', 'email'],    // L'email est requis et doit être valide
            'password' => ['required'],          // Le mot de passe est requis
        ]);

        // Tente de connecter l'utilisateur avec les identifiants fournis
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // Si la connexion réussit, redirige vers une route protégée
            return redirect()->route('login'); 

        // En cas d'échec, revient à la page précédente avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les identifiants fournis sont incorrects.',
        ]);
        }
    }
}