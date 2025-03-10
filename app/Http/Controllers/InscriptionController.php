<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class InscriptionController extends Controller
{
    public function formulaire() {
        return view("inscription");
    }

    public function traitement(Request $request) {
        // Validation des données de formulaire
        $validated = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'pseudo' => ['required', 'min:2', 'unique:users,pseudo', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email', 'max:50'],
            'email_verif' => ['required', 'email', 'same:email', 'max:50'],
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters() 
                ->mixedCase()
                ->numbers()
                ->symbols(), 
                'max:255'],
        ]);
    
        // Debugging : Voir les données validées
        \Log::info('Form data validated', $validated);
    
        // Création de l'utilisateur avec email non vérifié
        $utilisateur = User::create([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash du mot de passe
            'email_verified_at' => null, // Laisser NULL pour forcer la vérification
            'token' => Str::random(60),
            'id_role' => 1,
        ]);
    
        // Debugging : Vérifier si l'utilisateur a été créé
        \Log::info('User created', $utilisateur->toArray());
    
        // Envoi de l'email de vérification
        //$utilisateur->sendEmailVerificationNotification();
    
        // Redirection avec message
        return redirect()->route('login')->with('success', 'Un email de confirmation a été envoyé.');
    }
}