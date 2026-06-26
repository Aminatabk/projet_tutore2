@extends('layouts.app')

@section('content')

<h2 class="mb-4">Modifier la réclamation</h2>

<form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label class="form-label">Abonné</label>

        <select name="abonne_id" class="form-control">

            @foreach($abonnes as $abonne)

                <option value="{{ $abonne->id }}"
                    {{ $reclamation->abonne_id == $abonne->id ? 'selected' : '' }}>
                    {{ $abonne->nom }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">
        <label class="form-label">Objet</label>
        <input type="text" name="objet" class="form-control" value="{{ $reclamation->objet }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ $reclamation->description }}</textarea>
    </div>

    <div class="mb-3">

        <label class="form-label">Statut</label>

        <select name="statut" class="form-control">

            @foreach(['En attente', 'En cours', 'Traitée', 'Rejetée'] as $statut)

                <option value="{{ $statut }}"
                    {{ $reclamation->statut == $statut ? 'selected' : '' }}>
                    {{ $statut }}
                </option>

            @endforeach

        </select>

    </div>

    <button class="btn btn-primary">Mettre à jour</button>

    <a href="{{ route('reclamations.index') }}" class="btn btn-secondary">
        Retour
    </a>

</form>

@endsection
