<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    protected $table = 'Composer';
    public $timestamps = false;

    protected $fillable = ['user_id', 'id_media', 'id_liste'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // utilisateur propriétaire
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'id_media'); // média lié
    }
}