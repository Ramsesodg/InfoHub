<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Fiche extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis
    protected $fillable = [
        'nom_enquete',
        'prenom_enquete',
        'telephone_enquete',
        'ville',
        'longitude',
        'latitude',
        'nom_realisation',
        'type_enquete',
        'validation',
        'synchro',

    ];

    // Relation avec le modèle Profil
    public function profil()
    {
        return $this->belongsTo(Profil::class, 'id_profil');
    }

    const TYPE_OUAGADOUGOU = 'ouagadougou';
    const TYPE_KAYA = 'kaya';
    const TYPE_DORI = 'dori';
    const SYNCHRO = 0;
    const NOSYNCHRO= 1;
    const TYPE_FORAGE = 'forage';
    const TYPE_SAPONIFICATION = 'saponification';

    // Statuts de validation
    const STATUT_INITIE = 0;
    const STATUT_VALIDE = 1;
    const STATUT_REJETE = 2;


}
