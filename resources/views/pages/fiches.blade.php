@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'fiches'
])

@section('content')
<div class="container">
    <h1>Liste des Fiches</h1>
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <h5>  {{ session('success') }}</h5>
                        <span aria-hidden="true">&times;</span>

                </div>
            @endif

    <form action="" method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un profil" value="">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

<!-- Bouton pour ouvrir le modal Créer une Fiche -->
<button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#createFicheModal">
        Ajouter une Nouvelle Fiche
    </button>

    <!-- Modal Créer une Fiche -->
    <div class="modal fade" id="createFicheModal" tabindex="-1" aria-labelledby="createFicheModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createFicheModalLabel">Créer une Nouvelle Fiche</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fiches.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nom_prenom_enquete">Nom & Prénom</label>
                            <input type="text" class="form-control" id="nom_prenom_enquete" name="nom_prenom_enquete" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone_enquete">Téléphone</label>
                            <input type="text" class="form-control" id="telephone_enquete" name="telephone_enquete" required>
                        </div>
                        <div class="mb-3">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <div class="mb-3">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom_realisation">Nom Réalisation</label>
                            <input type="text" class="form-control" id="nom_realisation" name="nom_realisation" required>
                        </div>
                        <div class="mb-3">
                            <label for="type_enquete">Type Enquête</label>
                            <input type="text" class="form-control" id="type_enquete" name="type_enquete" required>
                        </div>
                        <div class="mb-3">
                            <label for="synchro">Synchronisation</label>
                            <select class="form-control" id="synchro" name="synchro" required>
                                <option value="oui">Oui</option>
                                <option value="non">Non</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="validation">Validation</label>
                            <select class="form-control" id="validation" name="validation" required>
                                <option value="validé">Validé</option>
                                <option value="non_validé">Non Validé</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Créer</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des Fiches -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nom & Prénom</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Nom Réalisation</th>
                <th>Type Enquête</th>
                <th>Synchro</th>
                <th>Validation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Marie Curie</td>
                <td>+33 7 89 01 23 45</td>
                <td>Paris</td>
                <td>2.3522</td>
                <td>48.8566</td>
                <td>Analyse</td>
                <td>Type A</td>
                <td>Oui</td>
                <td>Validé</td>
                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFicheModal">Modifier</button>
                    <button class="btn btn-danger btn-sm">Désactiver</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Modal Modifier une Fiche -->
    <div class="modal fade" id="editFicheModal" tabindex="-1" aria-labelledby="editFicheModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFicheModalLabel">Modifier la Fiche</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nom_prenom">Nom & Prénom</label>
                            <input type="text" class="form-control" id="nom_prenom" value="Marie Curie">
                        </div>
                        <!-- Répéter les champs comme dans la création -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
