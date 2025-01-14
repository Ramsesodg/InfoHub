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
                            <label for="type_enquete">Type Enquête</label>
                           <select name="type_enquete"  class="form-control" id="type_enquete" >
                                <option value="">selectionner un type</option>
                                <option value="forage">Forage</option>
                                <option value="saponification">Saponification</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nom_enquete">Nom </label>
                            <input type="text" class="form-control" id="nom_enquete" name="nom_enquete" >
                        </div>
                        <div class="mb-3">
                            <label for="prenom_enquete">Prénom</label>
                            <input type="text" class="form-control" id="prenom_enquete" name="prenom_enquete" >
                        </div>
                        <div class="mb-3">
                            <label for="telephone_enquete">Téléphone</label>
                            <input type="text" class="form-control" id="telephone_enquete" name="telephone_enquete" >
                        </div>
                       <div class="mb-3">
                            <label for="ville">Ville</label>
                           <select name="ville"  class="form-control" id="ville" >
                                <option value="">selectionner une ville</option>
                                <option value="ouagadougou">Ouagadougou</option>
                                <option value="kaya">Kaya</option>
                                <option value="dori">Dori</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" >
                        </div>
                        <div class="mb-3">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" >
                        </div>
                        <div class="mb-3">
                            <label for="nom_realisation">Nom Réalisation</label>
                            <input type="text" class="form-control" id="nom_realisation" name="nom_realisation" >
                        </div>

                        <div class="mb-3">
                            <label for="synchro">Synchro</label>
                            <select name="synchro" class="form-control" >
                                <option value="0">Synchronisé</option>
                                <option value="1">Non synchronisé</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="validation">Validation</label>
                            <select name="validation" class="form-control" >
                                <option value="0">Initier</option>
                                <option value="1">Valider</option>
                                <option value="2">Rejeter</option>
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
                <th>Type Enquête</th>
                <th>Nom & Prénom</th>
                <th>Téléphone</th>
                <th>Ville</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Nom Réalisation</th>
                <th>Synchro</th>
                <th>Validation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($fiches as $fiche)
            <tr>
                <td>{{ $fiche->type_enquete }}</td>
                <td>{{ $fiche->nom_enquete }} {{ $fiche->prenom_enquete }}</td>
                <td>{{ $fiche->telephone_enquete }}</td>
                <td>{{ $fiche->ville }}</td>
                <td>{{ $fiche->longitude }}</td>
                <td>{{ $fiche->latitude }}</td>
                <td>{{ $fiche->nom_realisation }}</td>
                <td>
                        <form action="{{ route('fiches.toggleStatus', $fiche->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-{{ $fiche->synchro == 0 ? 'danger' : 'success' }} btn-sm">
                                {{ $fiche->synchro == 0 ? 'Non synchronisé' : 'Synchronisé' }}
                            </button>
                        </form>
                    @if($fiche->synchro == 0)
                    @elseif($fiche->synchro == 1)
                    @endif
                </td>
                <td>   @if($fiche->validation == 0) Initié
                    @elseif($fiche->validation == 1) Validé
                    @else Rejeté
                    @endif
                </td>

                <td>
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFicheModal{{ $fiche->id }}">Modifier</button>

                    <!--form action="{{ route('fiches.delete', $fiche->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="btn btn-danger btn-sm shadow-lg border-0 rounded-pill px-3 py-2"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette fiche ?')"
                            style="transition: background-color 0.3s ease, transform 0.3s ease;">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>
                    </form-->

                </td>



            </tr>
                    <!-- Modal Modifier une Fiche -->
               <!-- Modal Modifier une Fiche -->
<div class="modal fade" id="editFicheModal{{ $fiche->id }}" tabindex="-1" aria-labelledby="editFicheModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFicheModalLabel">Modifier la Fiche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('fiches.update', $fiche->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom_enquete">Nom </label>
                        <input type="text" class="form-control" id="nom_enquete" name="nom_enquete" value="{{ old('nom_enquete', $fiche->nom_enquete) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="prenom_enquete">Prénom</label>
                        <input type="text" class="form-control" id="prenom_enquet" name="prenom_enquete" value="{{ old('prenom_enquete', $fiche->prenom_enquete) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="telephone_enquete">Téléphone</label>
                        <input type="text" class="form-control" id="telephone_enquete" name="telephone_enquete" value="{{ old('telephone_enquete', $fiche->telephone_enquete) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville', $fiche->ville) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $fiche->longitude) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $fiche->latitude) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nom_realisation">Nom Réalisation</label>
                        <input type="text" class="form-control" id="nom_realisation" name="nom_realisation" value="{{ old('nom_realisation', $fiche->nom_realisation) }}" >
                    </div>
                    <div class="mb-3">
                        <label for="type_enquete">Type Enquête</label>
                       <select name="type_enquete"  class="form-control" id="type_enquete" value="{{ old('type_enquete', $fiche->type_enquete) }}">
                            <option value="forage">Forage</option>
                            <option value="saponification">Saponification</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validation">Validation</label>

                        <select name="validation" class="form-control" >
                            <option value="0" {{ $fiche->validation == 0 ? 'selected' : '' }}>Initier</option>
                            <option value="1" {{ $fiche->validation == 1 ? 'selected' : '' }}>Validé</option>
                            <option value="2" {{ $fiche->validation == 2 ? 'selected' : '' }}>Rejeter</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>

            @endforeach
        </tbody>
    </table>
     <!-- Ma section pagination -->

     <div class="pagination justify-content-center">
    @if ($fiches->onFirstPage())
        <span class="btn btn-secondary disabled">Précédent</span>
    @else
        <a
            href="{{ $fiches->previousPageUrl() }}@if(request('search'))&search={{ request('search') }}@endif"
            class="btn btn-primary"
        >
            Précédent
        </a>
    @endif

    @for ($i = 1; $i <= $fiches->lastPage(); $i++)
        <a
            href="{{ $fiches->url($i) }}@if(request('search'))&search={{ request('search') }}@endif"
            class="btn {{ $i == $fiches->currentPage() ? 'btn-secondary' : 'btn-outline-primary' }}"
        >
            {{ $i }}
        </a>
    @endfor

    @if ($fiches->hasMorePages())
        <a
            href="{{ $fiches->nextPageUrl() }}@if(request('search'))&search={{ request('search') }}@endif"
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



</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
