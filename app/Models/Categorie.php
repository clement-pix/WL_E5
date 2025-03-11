<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categorie'; // Vérifie le nom exact de ta table
    protected $primaryKey = 'id_categorie'; // Définit la clé primaire
    public $timestamps = false; // Désactive les timestamps si non présents en base

    protected $fillable = ['nom']; // Ajoute les colonnes modifiables
}
