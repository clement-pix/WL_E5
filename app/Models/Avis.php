<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    /**
     * Nom de la table associée au modèle.
     *
     * @var string
     */
    protected $table = 'avis';

    /**
     * Les attributs pouvant être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'id_media',     // Référence au média concerné
        'id',           // ID de l'utilisateur (membre) ayant laissé l'avis
        'note',         // Note attribuée (ex: 1 à 5)
        'commentaire',  // Texte libre du commentaire
    ];

    /**
     * Désactive la gestion automatique des colonnes `created_at` et `updated_at`.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Relation avec le modèle User (le membre ayant laissé l'avis).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membre()
    {
        // Le champ 'id' dans cette table correspond au champ 'id' dans la table 'users'
        return $this->belongsTo(\App\Models\User::class, 'id', 'id');
    }
}
