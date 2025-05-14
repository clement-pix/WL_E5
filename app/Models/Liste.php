<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    /**
     * Nom de la table associée à ce modèle.
     *
     * @var string
     */
    protected $table = 'liste';

    /**
     * Clé primaire de la table.
     *
     * @var string
     */
    protected $primaryKey = 'id_liste';

    /**
     * Désactive les colonnes `created_at` et `updated_at` gérées automatiquement par Laravel.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Attributs autorisés à être remplis par assignation de masse.
     *
     * @var array
     */
    protected $fillable = ['nom', 'date_creation', 'id'];

    /**
     * Relation avec l'utilisateur propriétaire de la liste.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // 'id' correspond à l'identifiant de l'utilisateur dans la table `users`
        return $this->belongsTo(User::class, 'id');
    }
}
