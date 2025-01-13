<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'nom_utilisateur',
        'pass',
        'type',
        'status',
    ];

    public function fiches()
    {
        return $this->hasMany(Fiche::class, 'id_profil');
    }
    
}
