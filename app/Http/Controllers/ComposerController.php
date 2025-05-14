<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Composer;
use App\Models\Liste;
use Illuminate\Support\Facades\Auth;

class ComposerController extends Controller
{
    /**
     * Affiche la liste privée des médias de l'utilisateur connecté.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = Auth::id(); // Récupère l'ID de l'utilisateur connecté

        // Récupère tous les médias de la table pivot WL_Composer liés à l'utilisateur
        // et charge la relation "media" pour chaque élément (eager loading)
        $liste = Composer::where('user_id', $userId)
            ->with(['media']) // permet d'accéder à $item->media dans la vue
            ->get();

        // Affiche la vue avec les résultats
        return view('dashboard.private_list.index', compact('liste'));
    }

    /**
     * Ajoute un média à la liste privée de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Vérifie que le média envoyé existe bien dans la table "media"
        $request->validate([
            'id_media' => 'required|exists:media,id_media',
        ]);

        $userId = Auth::id(); // Récupère l'utilisateur actuel

        // Cherche une liste existante pour cet utilisateur ou en crée une
        $liste = Liste::firstOrCreate(
            ['id' => $userId], // correspond à la colonne "id" dans la table WL_liste
            [
                'nom' => 'Liste privée',
                'date_creation' => now(),
            ]
        );

        // Ajoute une ligne dans WL_Composer (sans dupliquer si déjà présent)
        Composer::firstOrCreate([
            'user_id' => $userId,
            'id_media' => $request->id_media,
            'id_liste' => $liste->id_liste,
        ]);

        return redirect()->back()->with('success', 'Média ajouté à votre liste personnelle.');
    }

    /**
     * Supprime un média de la liste privée de l'utilisateur connecté.
     *
     * @param  int  $id_media
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id_media)
    {
        $userId = Auth::id(); // ID de l'utilisateur connecté

        // Supprime la ligne dans la table pivot Composer où l'utilisateur et le média correspondent
        Composer::where('user_id', $userId)
            ->where('id_media', $id_media)
            ->delete();

        return redirect()->back()->with('success', 'Média retiré de votre liste privée.');
    }
}
