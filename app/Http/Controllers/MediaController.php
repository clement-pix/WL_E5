<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Categorie;
use App\Models\Genre;

use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function welcome()
    {
        $medias = Media::all();
        return view('welcome', compact('medias'));
    }
    
    public function index()
{
    $medias = Media::all();
    return view('media.index', compact('medias'));
}


    public function create()
{
    $categories = Categorie::all();
    $genres = Genre::all(); 

    return view('media.create', compact('categories', 'genres'));
}

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Supprimer image si nécessaire
        if ($media->lien_image && \Storage::disk('public')->exists(str_replace('storage/', '', $media->lien_image))) {
            \Storage::disk('public')->delete(str_replace('storage/', '', $media->lien_image));
        }

        // Détacher genre si pivot existe
        $media->genres()->detach();

        $media->delete();

        return redirect()->back()->with('success', 'Média supprimé avec succès.');
    }

public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image',
        'id_categorie' => 'required|exists:categorie,id_categorie',
        'id_genre' => 'required|exists:genre,id_genre',
    ]);

    // Sauvegarde de l'image
    $path = $request->file('image')->store('media', 'public');

    // Création du média
    $media = Media::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'lien_image' => 'storage/' . $path,
        'id_categorie' => $request->id_categorie,
        'date_ajout' => now(),
    ]);

    // Association du genre via la table pivot "posseder"
    $media->genres()->attach($request->id_genre);

    return redirect()->route('media.index')->with('success', 'Média ajouté avec succès.');
}

    public function show($id)
{
    // Charge le média avec la relation avis
    $media = Media::with('avis')->findOrFail($id);

    // Vérifie si l'utilisateur connecté a déjà laissé un avis pour ce média
    $alreadyCommented = false;
    if (auth()->check()) {
        $alreadyCommented = $media->avis->where('id', auth()->id())->isNotEmpty();
    }

    return view('media.show', compact('media', 'alreadyCommented'));
}

}
