<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Avis;

class AvisController extends Controller
{
    public function store(Request $request, Media $media)
{
    // Vérification si l'utilisateur a déjà laissé un avis (en vérifiant le champ id_membre)
    if ($media->avis->where('id', auth()->id())->isNotEmpty()) {
        return redirect()->back()->with('error', 'Vous avez déjà laissé un avis sur ce média.');
    }

    $request->validate([
        'note'    => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ]);

    Avis::create([
        'id_media'    => $media->id_media,
        'id'   => auth()->id(), // Utilisation du champ id_membre pour stocker l'ID de l'utilisateur
        'note'        => $request->note,
        'commentaire' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Commentaire et avis ajoutés avec succès !');
}

public function edit(Avis $avis)
{
    // Vérifier que l'utilisateur connecté est bien l'auteur de l'avis
    if (auth()->id() !== $avis->id) {
        abort(403, 'Vous n\'êtes pas autorisé à modifier cet avis.');
    }
    return view('avis.edit', compact('avis'));
}

public function update(Request $request, Avis $avis)
{
    // Vérifier que l'utilisateur connecté est bien l'auteur de l'avis
    if (auth()->id() !== $avis->id) {
        abort(403, 'Vous n\'êtes pas autorisé à modifier cet avis.');
    }

    $request->validate([
        'note'    => 'required|integer|min:1|max:5',
        'comment' => 'required|string|max:1000',
    ]);

    $avis->update([
        'note'        => $request->note,
        'commentaire' => $request->comment,
    ]);

    return redirect()->route('media.show', $avis->id_media)
                     ->with('success', 'Votre avis a été modifié.');
}


}
