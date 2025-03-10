<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('login');
    }

    // Gère la connexion de l'utilisateur
    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Tentative d'authentification de l'utilisateur
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');  // Redirige vers la page du dashboard
        }

        // En cas d'échec de l'authentification
        return back()->withErrors([
            'email' => 'Les informations d\'identification sont incorrectes.',
        ]);
    }

    // Gère la déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout(); // Déconnecte l'utilisateur
        return view('logout'); // Redirige vers la vue de déconnexion
    }
}