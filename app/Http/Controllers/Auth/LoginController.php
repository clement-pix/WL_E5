<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Retourne la vue contenant le formulaire de connexion
        return view('login');
    }

    /**
     * Traite les informations de connexion soumises par l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valide les données envoyées par l'utilisateur
        $request->validate([
            'email' => 'required|email',         // L'email est requis et doit être valide
            'password' => 'required|min:8',      // Le mot de passe est requis et doit faire au moins 8 caractères
        ]);

        // Vérifie les identifiants via le système d'authentification Laravel
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Si l'authentification réussit, redirige vers le dashboard
            return redirect()->route('dashboard');
        }

        // Sinon, renvoie l'utilisateur au formulaire avec une erreur
        return back()->withErrors([
            'email' => 'Les informations d\'identification sont incorrectes.',
        ]);
    }

    /**
     * Déconnecte l'utilisateur actuellement connecté.
     *
     * @return \Illuminate\View\View
     */
    public function logout()
    {
        // Déconnecte l'utilisateur
        Auth::logout();

        // Affiche une vue de confirmation de déconnexion
        return view('logout');
    }
}
