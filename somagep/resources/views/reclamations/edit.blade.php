@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning text-white">

        <h4 class="mb-0">
            Modifier la réclamation
        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Abonné
                </label>

                <select name="abonne_id"
                        class="form-control">

                    @foreach($abonnes as $abonne)

                        <option value="{{ $abonne->id }}" {{ $abonne->id == $reclamation->abonne_id ? 'selected' : '' }}>
                            {{ $abonne->nom }} {{ $abonne->prenom }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Objet
                </label>

                <input type="text"
                       name="objet"
                       class="form-control"
                       value="{{ $reclamation->objet }}">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          class="form-control">{{ $reclamation->description }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Statut
                </label>

                <select name="statut" class="form-control">
                    <option value="En attente" {{ $reclamation->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                    <option value="En cours" {{ $reclamation->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                    <option value="Traitée" {{ $reclamation->statut == 'Traitée' ? 'selected' : '' }}>Traitée</option>
                    <option value="Rejetée" {{ $reclamation->statut == 'Rejetée' ? 'selected' : '' }}>Rejetée</option>
                </select>

            </div>

            <button class="btn btn-success">
                Mettre à jour
            </button>

        </form>

    </div>

</div>

@endsection
