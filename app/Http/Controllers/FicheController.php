<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use Illuminate\Http\Request;

class FicheController extends Controller
{
    // Afficher toutes les enquêtes
    public function allFiches(Request $request)
    {
        $fiches = Fiche::all();
        $search = $request->input('search');

        $fiches = Fiche::when($search, function ($query, $search) {
            $query->where('nom_enquete', 'like', "%$search%")
                ->orWhere('prenom_enquete', 'like', "%$search%")
                ->orWhere('telephone_enquete', 'like', "%$search%")
                ->orWhere('ville', 'like', "%$search%")
                ->orWhere('nom_realisation', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%");
        })->paginate(02);
        return view('pages.fiches', compact('fiches'));
    }


    // Enregistrer une nouvelle enquête
    public function storeFiche(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom_enquete' => 'required|string|max:255',
            'prenom_enquete' => 'required|string|max:255',
            'telephone_enquete' => 'required|string|regex:/^(\+?[0-9\s\-]{6,20})$/',
            'ville' => 'required|string|max:255',
            'longitude' => 'required|numeric|between:-180,180',
            'latitude' => 'required|numeric|between:-90,90',
            'nom_realisation' => 'required|string|max:255',
            'type_enquete' => 'required|in:forage,saponification',
            'validation' => 'required|in:0,1,2',
        ]);

        // Création de l'enquête
        $fiche = Fiche::create([
            'nom_enquete' => $request->nom_enquete,
            'prenom_enquete' => $request->prenom_enquete,
            'telephone_enquete' => $request->telephone_enquete,
            'ville' => $request->ville,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'nom_realisation' => $request->nom_realisation,
            'type_enquete' => $request->type_enquete,
            'validation' => $request->validation,
        ]);

        // Vérification si la fiche est bien enregistrée
        if ($fiche) {
            return redirect()->route('fiches')->with('success', 'Nouvelle Fiche créée avec succès.');
        } else {
            return redirect()->route('fiches')->with('error', 'Échec de la création de la fiche.');
        }
    }


    // Mettre à jour une enquête existante
    public function updateFiche(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom_enquete' => 'required|string|max:255',
            'prenom_enquete' => 'required|string|max:255',
            'telephone_enquete' => 'required|string|regex:/^(\+?[0-9\s\-]{6,20})$/',
            'ville' => 'required|string|max:255',
            'longitude' => 'required|numeric|between:-180,180',
            'latitude' => 'required|numeric|between:-90,90',
            'nom_realisation' => 'required|string|max:255',
            'type_enquete' => 'required|in:forage,saponification',
            'validation' => 'required|in:0,1,2',
        ]);

        // Trouver la fiche à mettre à jour
        $fiche = Fiche::findOrFail($id);

        // Mettre à jour la fiche
        $fiche->update([
            'nom_enquete' => $request->nom_enquete,
            'prenom_enquete' => $request->prenom_enquete,
            'telephone_enquete' => $request->telephone_enquete,
            'ville' => $request->ville,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'nom_realisation' => $request->nom_realisation,
            'type_enquete' => $request->type_enquete,
            'validation' => $request->validation,
        ]);

        // Notification de succès
        return redirect()->route('fiches')->with('success', 'Fiche mise à jour avec succès.');
    }

    public function updateValidation(Request $request, $id, $validation)
    {
        // Trouver la fiche par ID
        $fiche = Fiche::findOrFail($id);

        // Mettre à jour la valeur de validation
        $fiche->validation = $validation;
        $fiche->save();

        // Retourner à la page précédente avec un message
        return redirect()->route('fiches')->with('success', 'La fiche a été mis à jour.');
    }


    public function toggleStatus($id)
    {
        // Récupération du profil
        $fiche = Fiche::findOrFail($id);

        // Inversion du statut
        $fiche->synchro = $fiche->synchro == 0 ? 1 : 0;
        $fiche->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Synchronisation de la fiche mis à jour avec succès.');
    }

    // Supprimer une enquête
    public function deleteFiche($id)
    {
        // Trouver la fiche à supprimer
        $fiche = Fiche::findOrFail($id);

        // Supprimer la fiche
        $fiche->delete();

        // Notification de succès
        return redirect()->route('fiches')->with('success', 'Fiche supprimée avec succès.');
    }

}
