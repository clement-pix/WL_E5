<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UtilisateursController extends Controller
{
    /**
     * Affiche la liste de tous les utilisateurs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('users.index', compact('users'));
    }

    /**
     * Affiche le formulaire d'édition d'un utilisateur donné.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user')); // Envoie l'utilisateur à la vue
    }

    /**
     * Met à jour les informations d'un utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        // Validation des champs du formulaire
        $request->validate([
            'name'      => 'required|string|max:50',
            'firstname' => 'required|string|max:50',
            'pseudo'    => 'required|min:2|max:50|unique:users,pseudo,' . $user->id,
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'role'      => 'required|integer',
        ]);

        // Mise à jour dans la base de données
        $user->update([
            'name'      => $request->name,
            'firstname' => $request->firstname,
            'pseudo'    => $request->pseudo,
            'email'     => $request->email,
            'id_role'   => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur, sauf lui-même.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        // Empêche la suppression de son propre compte
        if (auth()->id() == $user->id) {
            return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete(); // Suppression définitive
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}