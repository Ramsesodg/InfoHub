<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;


class ProfilController extends Controller
{
    // Afficher la liste des profils
    public function index()
    {
        $profils = Profil::all(); // Récupère tous les profils
        return view('profils.manage', compact('profils')); // Envoie les données à la vue
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('profils.create'); // Optionnel si on gère tout sur la même vue
    }

    // Enregistrer un nouveau profil
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:profils,email',
            'telephone' => 'required|string|max:20',
            'nom_utilisateur' => 'required|string|max:255|unique:profils,nom_utilisateur',
            'pass' => 'required|string|min:6',
        ]);

        Profil::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom_utilisateur' => $request->nom_utilisateur,
            'pass' => bcrypt($request->pass),
            'type' => $request->type ?? 'utilisateur', // Défaut : utilisateur
        ]);

        return redirect()->route('profils.index')->with('success', 'Profil créé avec succès.');
    }

    // Afficher un profil spécifique (si besoin)
    public function show($id)
    {
        $profil = Profil::findOrFail($id);
        return view('profils.show', compact('profil'));
    }

    // Afficher le formulaire d'édition
    public function edit($id)
    {
        $profil = Profil::findOrFail($id);
        return view('profils.edit', compact('profil'));
    }

    // Mettre à jour un profil existant
    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:profils,email,' . $profil->id_profil,
            'telephone' => 'required|string|max:20',
            'nom_utilisateur' => 'required|string|max:255|unique:profils,nom_utilisateur,' . $profil->id_profil,
        ]);

        $profil->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom_utilisateur' => $request->nom_utilisateur,
            'type' => $request->type ?? $profil->type,
        ]);

        return redirect()->route('profils.index')->with('success', 'Profil mis à jour avec succès.');
    }

    // Désactiver un profil (au lieu de le supprimer)
    public function disable($id)
    {
        $profil = Profil::findOrFail($id);
        $profil->update(['status' => 'désactivé']); // Supposons une colonne 'status' dans la table
        return redirect()->route('profils.index')->with('success', 'Profil désactivé avec succès.');
    }

    // Supprimer définitivement (si besoin)
    public function destroy($id)
    {
        Profil::destroy($id); // Supprime le profil
        return redirect()->route('profils.index')->with('success', 'Profil supprimé avec succès.');
    }
}
