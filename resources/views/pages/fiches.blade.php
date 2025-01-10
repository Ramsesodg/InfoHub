@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fiches'
])

@section('content')
<div class="container">
    <h1>Liste des Fiches</h1>

    <form action="" method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un profil" value="">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    <!-- Bouton pour créer une nouvelle fiche -->
    <button class="btn btn-primary my-3" data-bs-toggle="collapse" data-bs-target="#createFicheForm">
        Créer une Nouvelle Fiche
    </button>

    <!-- Formulaire de création -->
    <div class="collapse" id="createFicheForm">
        <div class="card card-body">
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nom_prenom_enquete">Nom & Prénom</label>
                        <input type="text" name="nom_prenom_enquete" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telephone_enquete">Téléphone</label>
                        <input type="text" name="telephone_enquete" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Créer</button>
            </form>
        </div>
    </div>

    <!-- Tableau des fiches -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nom & Prénom</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Exemple statique de fiche -->
            <tr>
                <td>Jean Dupont</td>
                <td>+33 6 12 34 56 78</td>
                <td>Paris</td>
                <td>2.3522</td>
                <td>48.8566</td>
                <td>
                    <!-- Bouton Modifier -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal1">
                        Modifier
                    </button>

                    <!-- Bouton Désactiver -->
                    <form action="#" method="POST" style="display:inline;">
                        <button type="submit" class="btn btn-danger btn-sm">Désactiver</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modifier la Fiche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="nom_prenom_enquete">Nom & Prénom</label>
                        <input type="text" name="nom_prenom_enquete" class="form-control" value="Jean Dupont" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone_enquete">Téléphone</label>
                        <input type="text" name="telephone_enquete" class="form-control" value="+33 6 12 34 56 78" required>
                    </div>
                    <div class="mb-3">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" class="form-control" value="Paris" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" class="form-control" value="2.3522" required>
                    </div>
                    <div class="mb-3">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" class="form-control" value="48.8566" required>
                    </div>
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
