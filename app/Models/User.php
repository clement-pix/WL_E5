<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;  // Ajouté
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Le nom de la table dans la base de données.
     *
     * @var string
     */
    //protected $table = 'WL_users';

    /**
     * La clé primaire de la table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Les attributs qui peuvent être affectés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'pseudo',
        'id_role',
    ];

    /**
     * Les attributs à masquer lors de la sérialisation.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs à caster.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Indique si les timestamps (created_at, updated_at) sont gérés automatiquement.
     *
     * @var bool
     */
    public $timestamps = true;
}
