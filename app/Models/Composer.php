<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    /**
     * Nom de la table associée.
     *
     * @var string
     */
    protected $table = 'Composer';

    /**
     * Désactive la gestion automatique des timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Champs pouvant être remplis en masse.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'id_media', 'id_liste'];

    /**
     * Relation : ce lien appartient à un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // user_id = clé étrangère vers la table users
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation : ce lien appartient à un média.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function media()
    {
        // id_media = clé étrangère vers la table media
        return $this->belongsTo(Media::class, 'id_media');
    }
}
