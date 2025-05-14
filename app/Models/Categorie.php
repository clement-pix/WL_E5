<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'categorie';

    /**
     * Clé primaire de la table.
     *
     * @var string
     */
    protected $primaryKey = 'id_categorie';

    /**
     * Désactive les colonnes automatiques `created_at` et `updated_at`.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Champs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = ['nom']; // Nom de la catégorie (ex : Action, Comédie, etc.)

    /**
     * Relation avec les médias : une catégorie possède plusieurs médias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medias()
    {
        // Clé étrangère dans la table "media" : id_categorie
        return $this->hasMany(Media::class, 'id_categorie');
    }
}
