<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    protected $table = 'liste';
    protected $primaryKey = 'id_liste';
    public $timestamps = false;

    protected $fillable = ['nom', 'date_creation', 'id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
