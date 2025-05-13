<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $primaryKey = 'id_media'; // Clé primaire
    public $timestamps = false;

    protected $fillable = ['titre', 'description', 'lien_image', 'date_ajout', 'id_categorie'];


    public function avis()
    {
    return $this->hasMany(\App\Models\Avis::class, 'id_media', 'id_media');
    }

    public function genres()
    {
    return $this->belongsToMany(Genre::class, 'posseder', 'id_media', 'id_genre');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

}

