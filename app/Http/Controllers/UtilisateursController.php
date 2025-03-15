<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UtilisateursController extends Controller
{
    // Affiche la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    
    // Affiche le formulaire d'édition d'un utilisateur
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    
    // Met à jour les informations d'un utilisateur
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'firstname' => 'required|string|max:50',
            'pseudo'    => 'required|min:2|unique:users,pseudo,' . $user->id . '|max:50',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role'      => 'required|integer',
        ]);
//test
        $user->update([
            'name'      => $request->name,
            'firstname' => $request->firstname,
            'pseudo'    => $request->pseudo,
            'email'     => $request->email,
            'id_role'   => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }
    
    // Supprime un utilisateur
    public function destroy(User $user)
    {
        // Vérifier que l'utilisateur ne tente pas de se supprimer lui-même
        if(auth()->id() == $user->id) {
            return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
