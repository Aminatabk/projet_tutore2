@extends('layouts.app')

@section('content')

<h2 class="mb-4">Nouvelle Réclamation</h2>

<form action="{{ route('reclamations.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label class="form-label">Abonné</label>

        <select name="abonne_id" class="form-control" required>

            @foreach($abonnes as $abonne)

                <option value="{{ $abonne->id }}">
                    {{ $abonne->nom }} {{ $abonne->prenom }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">
        <input type="text" name="objet" class="form-control" placeholder="Objet" required>
    </div>

    <div class="mb-3">
        <textarea name="description" class="form-control" placeholder="Description" required></textarea>
    </div>

    <button class="btn btn-success">Envoyer</button>

    <a href="{{ route('reclamations.index') }}" class="btn btn-secondary">
        Retour
    </a>

</form>

@endsection
