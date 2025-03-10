<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function afficherFormulaireConnexion()
    {
        return view('auth.connexion'); // Vue à créer
    }

    // Gère la connexion
    public function connexion(Request $requete)
    {
        $requete->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $identifiants = $requete->only('email', 'password');

        if (Auth::attempt(['email' => $identifiants['email'], 'password' => $identifiants['password']])) {
            // Redirige vers la page sécurisée
            return redirect()->intended('tableau_de_bord');
        }

        // Retourne avec un message d'erreur
        return back()->withErrors([
            'email' => 'Les informations d’identification ne sont pas valides.',
        ]);
    }

    // Gère la déconnexion
    public function deconnexion()
    {
        Auth::logout();
        return redirect('/connexion');
    }
}

{
    //
}
