<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Categorie;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /**
     * Affiche la page d'accueil publique avec les médias.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        $medias = Media::all(); // Récupère tous les médias
        return view('welcome', compact('medias')); // Envoie à la vue d'accueil
    }

    /**
     * Affiche la liste complète des médias (vue admin).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $medias = Media::all(); // Tous les médias
        return view('media.index', compact('medias')); // Vue de gestion
    }

    /**
     * Affiche le formulaire de création de média.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Categorie::all(); // Toutes les catégories
        $genres = Genre::all();         // Tous les genres (films, séries, etc.)

        return view('media.create', compact('categories', 'genres'));
    }

    /**
     * Enregistre un nouveau média avec image, catégorie et genre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'titre'         => 'required|string|max:255',
            'description'   => 'required|string',
            'image'         => 'required|image',
            'id_categorie'  => 'required|exists:categorie,id_categorie',
            'id_genre'      => 'required|exists:genre,id_genre',
        ]);

        // Sauvegarde de l’image dans le dossier "storage/app/public/media"
        $path = $request->file('image')->store('media', 'public');

        // Création du média dans la base de données
        $media = Media::create([
            'titre'        => $request->titre,
            'description'  => $request->description,
            'lien_image'   => 'storage/' . $path, // Stocké avec préfixe pour asset()
            'id_categorie' => $request->id_categorie,
            'date_ajout'   => now(), // Date d’ajout automatique
        ]);

        // Liaison du genre via la table pivot "posseder"
        $media->genres()->attach($request->id_genre);

        return redirect()->route('media.index')->with('success', 'Média ajouté avec succès.');
    }

    /**
     * Supprime un média (et son image) de la base.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        // Suppression du fichier image s’il existe dans le disque "public"
        if ($media->lien_image && Storage::disk('public')->exists(str_replace('storage/', '', $media->lien_image))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $media->lien_image));
        }

        // Détache tous les genres associés
        $media->genres()->detach();

        // Supprime le média de la base
        $media->delete();

        return redirect()->back()->with('success', 'Média supprimé avec succès.');
    }

    /**
     * Affiche la page d’un média avec ses détails et avis.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Charge le média avec ses avis associés
        $media = Media::with('avis')->findOrFail($id);

        // Vérifie si l’utilisateur a déjà laissé un avis
        $alreadyCommented = false;
        if (auth()->check()) {
            $alreadyCommented = $media->avis->where('id', auth()->id())->isNotEmpty();
        }

        return view('media.show', compact('media', 'alreadyCommented'));
    }
}