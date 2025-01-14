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

    }

    // Enregistrer un nouveau profil
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:profils,email', // Adjust the table name if necessary
            'telephone' => 'required|string|max:15',
            'nom_utilisateur' => 'required|string|max:255|unique:profils,nom_utilisateur', // Adjust accordingly
            'mot_de_passe' => 'required|string|min:6',
            'type' => 'required|in:admin,utilisateur', // Validate type exists
        ]);

        // Create a new profile
        Profil::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom_utilisateur' => $request->nom_utilisateur,
            'pass' => $request->mot_de_passe, // bcrypt() pur le Hachage du mot de passe
            'type' => $request->type,
        ]);

        // Redirect or return a response
        return redirect()->route('index')->with('success', 'Profil créé avec succès.');
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
        // Validation des données entrantes
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:profils,email,' . $id,
            'telephone' => 'required|string|max:20',
        ]);

        // Récupération du profil à mettre à jour
        $profil = Profil::findOrFail($id);

        // Mise à jour des données du profil
        $profil->update($validated);

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }

    // Désactiver un profil (au lieu de le supprimer)
    public function toggleStatus($id)
{
    // Récupération du profil
    $profil = Profil::findOrFail($id);

    // Inversion du statut
    $profil->status = $profil->status === 'actif' ? 'inactif' : 'actif';
    $profil->save();

    // Redirection avec un message de succès
    return redirect()->back()->with('success', 'Statut du profil mis à jour avec succès.');
}


    // Supprimer définitivement (si besoin)
    public function destroy($id)
    {
        Profil::destroy($id); // Supprime le profil
        return redirect()->route('profils.index')->with('success', 'Profil supprimé avec succès.');
    }
}
