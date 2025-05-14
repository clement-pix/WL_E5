<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     *
     * @return \Illuminate\View\View
     */
    public function formulaire()
    {
        // Charge la vue "inscription.blade.php"
        return view("inscription");
    }

    /**
     * Traite les données soumises lors de l'inscription.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function traitement(Request $request)
    {
        // Validation des données reçues
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:50'], // Nom obligatoire
            'firstname' => ['required', 'min:2', 'max:50'], // Prénom obligatoire
            'pseudo' => ['required', 'min:2', 'unique:users,pseudo', 'max:50'], // Pseudo unique
            'email' => ['required', 'email', 'unique:users,email', 'max:50'], // Email unique
            'email_verif' => ['required', 'email', 'same:email', 'max:50'], // Vérification d'email
            'password' => [
                'required',
                'confirmed', // Doit correspondre au champ "password_confirmation"
                Password::min(8)
                    ->letters()       // Doit contenir des lettres
                    ->mixedCase()     // Doit contenir majuscules + minuscules
                    ->numbers()       // Doit contenir des chiffres
                    ->symbols(),      // Doit contenir des caractères spéciaux
                'max:255'
            ],
        ]);

        // Création de l'utilisateur (non vérifié par défaut)
        $utilisateur = User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash sécurisé
            'email_verified_at' => null,              // Statut : non vérifié
            'token' => Str::random(60),               // Token de vérification ou usage futur
            'id_role' => 2,                           // Par défaut, rôle "membre"
        ]);

        // Redirection vers la connexion avec un message de succès
        return redirect()->route('login')->with('success', 'Un email de confirmation a été envoyé.');
    }
}
