<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Categorie;

use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $medias = Media::all(); // Récupère tous les médias de la table WL_media
        return view('welcome', compact('medias')); // Envoie les médias à la vue
    }

    public function create()
    {
        $categories = Categorie::all(); // Récupère toutes les catégories
        return view('media.create', compact('categories'));
    }
    


    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Fichiers images uniquement
            'id_categorie' => 'required|integer'
        ]);

        // Stocker l'image
        $path = $request->file('image')->store('public/images'); // Stocke dans storage/app/public/images

        // Enregistrement du média en base de données
        Media::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'lien_image' => str_replace('public/', 'storage/', $path), // Transforme le chemin
            'date_ajout' => now(),
            'id_categorie' => $request->id_categorie
        ]);

        return redirect('/')->with('success', 'Média ajouté avec succès !');
    }
}
