<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Redirige vers le bon dashboard selon le rôle de l'utilisateur
    public function index()
    {
        $role = auth()->user()->id_role;

        return match ($role) {
            1 => redirect()->route('dashboard.superadmin'),
            3 => redirect()->route('dashboard.membreadmin'),
            2 => redirect()->route('dashboard.membre'),
            default => abort(403, 'Accès interdit'),
        };
    }

    // Affiche le dashboard du superadmin
    public function superadmin()
    {
        return view('dashboard.superadmin');
    }

    // Affiche le dashboard du membre admin
    public function membreadmin()
    {
        return view('dashboard.membreadmin');
    }

    // Affiche le dashboard du membre simple
    public function membre()
    {
        return view('dashboard.membre');
    }
}