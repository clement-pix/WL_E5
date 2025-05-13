<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Composer;
use App\Models\Liste; 
use Illuminate\Support\Facades\Auth;

class ComposerController extends Controller
{
    public function index()
{
    $userId = Auth::id();

    $liste = Composer::where('user_id', $userId)
        ->with(['media'])
        ->get();

    return view('dashboard.private_list.index', compact('liste'));
}



    public function store(Request $request)
    {
        $request->validate([
            'id_media' => 'required|exists:media,id_media',
        ]);

        $userId = Auth::id();

        // Chercher ou créer une liste pour cet utilisateur
        $liste = Liste::firstOrCreate(
            ['id' => $userId],
            [
                'nom' => 'Liste privée',
                'date_creation' => now(),
            ]
        );

        // Ajouter le média à la liste de l'utilisateur
        Composer::firstOrCreate([
            'user_id' => $userId,
            'id_media' => $request->id_media,
            'id_liste' => $liste->id_liste,
        ]);

        return redirect()->back()->with('success', 'Média ajouté à votre liste personnelle.');
    }

    public function destroy($id_media)
{
    $userId = Auth::id();

    // Supprime l'entrée dans WL_Composer pour cet utilisateur et ce média
    Composer::where('user_id', $userId)
        ->where('id_media', $id_media)
        ->delete();

    return redirect()->back()->with('success', 'Média retiré de votre liste privée.');
}

}
