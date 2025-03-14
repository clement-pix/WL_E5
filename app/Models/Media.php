<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    //protected $table = 'WL_media'; // Assure-toi que c'est bien le bon nom de la table
    protected $primaryKey = 'id_media'; // Clé primaire
    public $timestamps = false;

    protected $fillable = ['titre', 'description', 'lien_image', 'date_ajout', 'id_categorie'];


    public function avis()
    {
    return $this->hasMany(\App\Models\Avis::class, 'id_media', 'id_media');
    }

}

