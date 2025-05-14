<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion à l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function afficherFormulaireConnexion()
    {
        // Affiche la vue contenant le formulaire de connexion
        return view('auth.connexion'); // cette vue existe dans resources/views/auth/connexion.blade.php
    }

    /**
     * Tente de connecter l'utilisateur avec les identifiants fournis.
     *
     * @param  \Illuminate\Http\Request  $requete
     * @return \Illuminate\Http\RedirectResponse
     */
    public function connexion(Request $requete)
    {
        // Valide les champs requis
        $requete->validate([
            'email' => 'required|email',  // L'email est requis et doit avoir un format valide
            'password' => 'required',     // Le mot de passe est requis
        ]);

        // Récupère uniquement l'email et le mot de passe
        $identifiants = $requete->only('email', 'password');

        // Tente d'authentifier l'utilisateur
        if (Auth::attempt($identifiants)) {
            // Si les identifiants sont valides, redirige vers la page prévue (ou tableau de bord par défaut)
            return redirect()->intended('tableau_de_bord');
        }

        // Si l'authentification échoue, retourne à la page avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d’identification ne sont pas valides.',
        ]);
    }

    /**
     * Déconnecte l'utilisateur actuel.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deconnexion()
    {
        // Déconnecte l'utilisateur
        Auth::logout();

        // Redirige vers la page de connexion
        return redirect('/connexion');
    }
}
