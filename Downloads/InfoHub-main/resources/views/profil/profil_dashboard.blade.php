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

   <!-- Bouton pour ouvrir le modal Créer un Profil -->
   <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#createProfileModal">
        Ajouter un Nouveau Profil
    </button>

    <!-- Modal Créer un Profil -->
<div class="modal fade" id="createProfileModal" tabindex="-1" aria-labelledby="createProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProfileModalLabel">Créer un Nouveau Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone">Téléphone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" required>
                    </div>
                    <div class="mb-3">
                        <label for="nom_utilisateur">Nom d'Utilisateur</label>
                        <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" required>
                    </div>
                    <div class="mb-3">
                        <label for="mot_de_passe">Mot de Passe</label>
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div class="mb-3">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="admin">Admin</option>
                            <option value="utilisateur">Utilisateur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status">Statut</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="actif">Actif</option>
                            <option value="inactif">Inactif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Créer</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Tableau des Profils -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!-- Pagination links -->
<div class="mt-4">

</div>
<style>
    /* Dans votre fichier CSS */
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination .page-item {
    margin: 0 5px;
}

.pagination .page-link {
    padding: 8px 16px;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    text-decoration: none;
    color: #333;
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    color: white;
}

.pagination .page-item.disabled .page-link {
    background-color: #e9ecef;
    color: #6c757d;
}

</style>

<!-- Modal Modifier un Profil -->
<div class="modal fade" id="editProfileModal-" tabindex="-1" aria-labelledby="editProfileModalLabel-" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel-">Modifier le Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nom-">Nom</label>
                        <input type="text" class="form-control" id="" name="nom" value="">
                    </div>

                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
