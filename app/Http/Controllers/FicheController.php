<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use Illuminate\Http\Request;

class FicheController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'profil_id' => 'required|exists:profils,id', // Vérifie que le profil existe
            'ville' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'nom_realisation' => 'required|string|max:255',
            'type_enquete' => 'required|string|max:255',
            'synchro' => 'required|in:oui,non',
            'validation' => 'required|in:validé,non_validé',
        ]);

        // Création de la fiche
        Fiche::create([
            'profil_id' => $request->profil_id,
            'ville' => $request->ville,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'nom_realisation' => $request->nom_realisation,
            'type_enquete' => $request->type_enquete,
            'synchro' => $request->synchro,
            'validation' => $request->validation,
        ]);

        return redirect()->back()->with('success', 'Fiche créée avec succès.');
    }


}
