<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_connexion extends Controller
{
    // Méthode pour afficher la vue du formulaire de connexion
    public function infoLogin()
    {
        return view('V_connexion');
    }
}