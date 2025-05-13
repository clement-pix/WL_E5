<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id_genre';
    public $timestamps = false;

    protected $fillable = ['type'];

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'posseder', 'id_genre', 'id_media');
    }
}
