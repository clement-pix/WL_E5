<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Avis;

class AvisController extends Controller
{
    /**
     * Enregistre un nouvel avis pour un média.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Media $media)
    {
        // Vérifie si l'utilisateur a déjà laissé un avis sur ce média
        if ($media->avis->where('id', auth()->id())->isNotEmpty()) {
            return redirect()->back()->with('error', 'Vous avez déjà laissé un avis sur ce média.');
        }

        // Valide les champs envoyés dans le formulaire
        $request->validate([
            'note'    => 'required|integer|min:1|max:5',       // Note entre 1 et 5
            'comment' => 'required|string|max:1000',           // Commentaire requis (max 1000 caractères)
        ]);

        // Création de l'avis dans la base
        Avis::create([
            'id_media'    => $media->id_media,      // ID du média concerné
            'id'          => auth()->id(),          // ID de l'utilisateur connecté
            'note'        => $request->note,        // Note attribuée
            'commentaire' => $request->comment,     // Texte du commentaire
        ]);

        // Retour avec un message de confirmation
        return redirect()->back()->with('success', 'Commentaire et avis ajoutés avec succès !');
    }

    /**
     * Affiche le formulaire de modification d'un avis.
     *
     * @param  \App\Models\Avis  $avis
     * @return \Illuminate\View\View
     */
    public function edit(Avis $avis)
    {
        // Vérifie que l'utilisateur est bien l'auteur de l'avis
        if (auth()->id() !== $avis->id) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cet avis.');
        }

        // Affiche la vue d'édition avec l'avis en question
        return view('avis.edit', compact('avis'));
    }

    /**
     * Met à jour un avis existant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avis  $avis
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Avis $avis)
    {
        // Vérifie que l'utilisateur est bien l'auteur de l'avis
        if (auth()->id() !== $avis->id) {
            abort(403, 'Vous n\'êtes pas autorisé à modifier cet avis.');
        }

        // Validation des nouvelles données
        $request->validate([
            'note'    => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        // Mise à jour de l'avis
        $avis->update([
            'note'        => $request->note,
            'commentaire' => $request->comment,
        ]);

        // Redirection vers la page du média avec un message
        return redirect()->route('media.show', $avis->id_media)
                         ->with('success', 'Votre avis a été modifié.');
    }
}