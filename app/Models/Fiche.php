<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Fiche extends Model
{
    use HasFactory;
    protected $fillable = [
        'profil_id',
        'ville',
        'longitude',
        'latitude',
        'nom_realisation',
        'type_enquete',
        'synchro',
        'validation',
    ];

    public function profil()
    {
        return $this->belongsTo(Profil::class, 'id_profil');
    }
}
