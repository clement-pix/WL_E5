<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie'; 
    protected $primaryKey = 'id_categorie';
    public $timestamps = false;

    protected $fillable = ['nom'];

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_categorie');
    }

}
