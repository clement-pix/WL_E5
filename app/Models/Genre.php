<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * Nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'genre';

    /**
     * Clé primaire personnalisée de la table.
     *
     * @var string
     */
    protected $primaryKey = 'id_genre';

    /**
     * Désactivation des timestamps Laravel (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Colonnes autorisées à être remplies via les formulaires (mass assignment).
     *
     * @var array
     */
    protected $fillable = ['type']; // Exemple de valeur : "film", "série", etc.

    /**
     * Relation plusieurs-à-plusieurs avec le modèle Media.
     * 
     * Un genre peut être associé à plusieurs médias,
     * et un média peut appartenir à plusieurs genres.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medias()
    {
        return $this->belongsToMany(
            Media::class,     // Modèle lié
            'posseder',       // Table pivot
            'id_genre',       // Clé étrangère du genre dans la pivot
            'id_media'        // Clé étrangère du média dans la pivot
        );
    }
}
