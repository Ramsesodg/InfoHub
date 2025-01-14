@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profils'
])

@section('content')
<div class="container">
    <h1>Gestion des Profils</h1>


        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <script>
            $(document).ready(function () {
                setTimeout(function () {
                    $("div.alert").fadeOut('slow', function () {
                        $(this).remove();
                    });
                }, 5000); // 5 secondes avant la disparition
            });
        </script>

    <form action="{{ route('index') }}" method="GET" class="d-flex mb-3">
        <input
            type="text"
            name="search"
            class="form-control me-2"
            placeholder="Rechercher un profil"
            value="{{ request('search') }}">
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
                    <form action="{{ route('profils.store') }}" method="POST">
                        @csrf

                        <!-- Ligne pour Nom, Prénom et Email -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="col-md-4">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                            <div class="col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <!-- Ligne pour Téléphone et Nom d'utilisateur -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nom_utilisateur">Nom d'Utilisateur</label>
                                <input type="text" class="form-control" id="nom_utilisateur" name="nom_utilisateur" required>
                            </div>
                        </div>

                        <!-- Ligne pour Mot de passe et Type -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="mot_de_passe">Mot de Passe</label>
                                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="admin">Admin</option>
                                    <option value="utilisateur">Utilisateur</option>
                                </select>
                            </div>
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
                <th>nom_d_utilisateur</th>
                <th>Mot_de_passe</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profils as $profil)
                <tr>
                    <td>{{ $profil->nom }}</td>
                    <td>{{ $profil->prenom }}</td>
                    <td>{{ $profil->email }}</td>
                    <td>{{ $profil->telephone }}</td>
                    <td>{{ $profil->nom_utilisateur }}</td>
                    <td>{{ $profil->pass }}</td>
                    <td>{{ $profil->type }}</td>
                    <td>
                        <span class="badge bg-{{ $profil->status === 'actif' ? 'success' : 'danger' }}">
                            {{ ucfirst($profil->status) }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal-{{ $profil->id }}">Modifier</button>
                        <form action="{{ route('profils.toggleStatus', $profil->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-{{ $profil->status === 'actif' ? 'danger' : 'success' }} btn-sm">
                                {{ $profil->status === 'actif' ? 'Désactiver' : 'Activer' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Ma section pagination -->

    <div class="pagination justify-content-center">
    @if ($profils->onFirstPage())
        <span class="btn btn-secondary disabled">Précédent</span>
    @else
        <a
            href="{{ $profils->previousPageUrl() }}@if(request('search'))&search={{ request('search') }}@endif"
            class="btn btn-primary"
        >
            Précédent
        </a>
    @endif

    @for ($i = 1; $i <= $profils->lastPage(); $i++)
        <a
            href="{{ $profils->url($i) }}@if(request('search'))&search={{ request('search') }}@endif"
            class="btn {{ $i == $profils->currentPage() ? 'btn-secondary' : 'btn-outline-primary' }}"
        >
            {{ $i }}
        </a>
    @endfor

    @if ($profils->hasMorePages())
        <a
            href="{{ $profils->nextPageUrl() }}@if(request('search'))&search={{ request('search') }}@endif"
            class="btn btn-primary"
        >
            Suivant
        </a>
    @else
        <span class="btn btn-secondary disabled">Suivant</span>
    @endif
</div>

<style>
    .pagination a, .pagination span {
        margin: 0 5px;
        padding: 10px 15px;
        border-radius: 5px;
    }
    .pagination .btn-outline-primary {
        border: 1px solid #007bff;
    }
    .pagination .btn-secondary.disabled {
        opacity: 0.6;
        pointer-events: none;
    }
</style>

<!-- Modal Modifier un Profil -->

    @foreach($profils as $profil)
<div class="modal fade" id="editProfileModal-{{ $profil->id }}" tabindex="-1" aria-labelledby="editProfileModalLabel-{{ $profil->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel-{{ $profil->id }}">Modifier le Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profils.update', $profil->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nom-{{ $profil->id }}">Nom</label>
                        <input type="text" class="form-control" id="nom-{{ $profil->id }}" name="nom" value="{{ $profil->nom }}">
                    </div>
                    <div class="mb-3">
                        <label for="prenom-{{ $profil->id }}">Prénom</label>
                        <input type="text" class="form-control" id="prenom-{{ $profil->id }}" name="prenom" value="{{ $profil->prenom }}">
                    </div>
                    <div class="mb-3">
                        <label for="email-{{ $profil->id }}">Email</label>
                        <input type="email" class="form-control" id="email-{{ $profil->id }}" name="email" value="{{ $profil->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="telephone-{{ $profil->id }}">Téléphone</label>
                        <input type="text" class="form-control" id="telephone-{{ $profil->id }}" name="telephone" value="{{ $profil->telephone }}">
                    </div>
                    <div class="mb-3">
                        <label for="telephone-{{ $profil->id }}">Nom d'utilisateur</label>
                        <input class="form-control" id="nom_utilisateur-{{ $profil->id }}" name="nom_utilisateur" value="{{ $profil->nom_utilisateur }}">
                    </div>
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
