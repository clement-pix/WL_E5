<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * Nom de la table associée.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * Clé primaire personnalisée.
     *
     * @var string
     */
    protected $primaryKey = 'id_media';

    /**
     * Désactive les timestamps automatiques (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Colonnes pouvant être assignées en masse.
     *
     * @var array
     */
    protected $fillable = [
        'titre',         // Titre du média
        'description',   // Description du film ou de la série
        'lien_image',    // Chemin de l'image d'illustration
        'date_ajout',    // Date d'ajout du média
        'id_categorie',  // Clé étrangère vers la table des catégories
    ];

    /**
     * Relation : un média peut avoir plusieurs avis.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function avis()
    {
        return $this->hasMany(\App\Models\Avis::class, 'id_media', 'id_media');
    }

    /**
     * Relation many-to-many : un média peut avoir plusieurs genres.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,   // Modèle lié
            'posseder',     // Table pivot
            'id_media',     // Clé locale
            'id_genre'      // Clé du genre
        );
    }

    /**
     * Relation : un média appartient à une seule catégorie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}