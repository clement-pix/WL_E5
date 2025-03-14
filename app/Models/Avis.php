<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 'avis';

    // Champs assignables en masse
    protected $fillable = [
        'id_media',    // Identifiant du média concerné
        'id',   // Identifiant du membre qui poste l'avis
        'note',        // Note (sur 5)
        'commentaire', // Contenu du commentaire
    ];

    public $timestamps = false;

    public function membre()
    {
    return $this->belongsTo(\App\Models\User::class, 'id', 'id');
    }

}

