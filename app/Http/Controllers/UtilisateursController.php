<?php

namespace App\Http\Controllers;

use App\Utilisateur;

class UtilisateursController extends Controller
{
    public function liste() {
        $utilisateur = Utilisateur::All();


        return view('utilisateur', [
            'utilisateur' => $utilisateur,
        ]);
    }
}
