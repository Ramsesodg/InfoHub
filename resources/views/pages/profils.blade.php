@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profils'
])

@section('content')
<div class="container">
    <h1>Gestion des Profils</h1>

    <form action="" method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" placeholder="Rechercher un profil" value="">
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>

    <!-- Bouton de création -->
    <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#createProfileModal">
        Ajouter un Nouveau Profil
    </button>

    <!-- Modal pour Ajouter un Nouveau Profil -->
    <div class="modal fade" id="createProfileModal" tabindex="-1" aria-labelledby="createProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProfileModalLabel">Ajouter un Nouveau Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="prenom">Prénom</label>
                                <input type="text" name="prenom" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telephone">Téléphone</label>
                                <input type="text" name="telephone" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nom_utilisateur">Nom Utilisateur</label>
                                <input type="text" name="nom_utilisateur" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pass">Mot de Passe</label>
                                <input type="password" name="pass" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des profils -->
    <table class="table table-striped table-bordered mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- Bouton Modifier -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                        Modifier
                    </button>

                    <!-- Form Désactiver -->
                    <form action="" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger btn-sm">Désactiver</button>
                    </form>
                </td>
            </tr>

            <!-- Modal Modifier -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Modifier le Profil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" name="prenom" class="form-control" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telephone">Téléphone</label>
                                    <input type="text" name="telephone" class="form-control" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nom_utilisateur">Nom Utilisateur</label>
                                    <input type="text" name="nom_utilisateur" class="form-control" value="" required>
                                </div>
                                <button type="submit" class="btn btn-success">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </tbody>
    </table>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
