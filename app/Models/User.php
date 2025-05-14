<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Clé primaire utilisée dans cette table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributs pouvant être remplis en masse (via formulaire, factory, etc.).
     *
     * @var array
     */
    protected $fillable = [
        'name',              // Nom de famille
        'firstname',         // Prénom
        'email',             // Adresse email
        'email_verified_at', // Timestamp de vérification email
        'password',          // Mot de passe (crypté)
        'remember_token',    // Token de session
        'pseudo',            // Pseudonyme
        'id_role',           // Rôle de l'utilisateur (1=admin, 2=membre, etc.)
    ];

    /**
     * Attributs masqués lors de la sérialisation (ex : JSON ou API).
     *
     * @var array
     */
    protected $hidden = [
        'password',         // Masque le mot de passe
        'remember_token',   // Masque le token
    ];

    /**
     * Transformation automatique de certains champs (cast).
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // transforme en instance DateTime
            'password' => 'hashed',            // hash automatiquement si modifié
        ];
    }

    /**
     * Active les colonnes `created_at` et `updated_at` automatiquement.
     *
     * @var bool
     */
    public $timestamps = true;
}