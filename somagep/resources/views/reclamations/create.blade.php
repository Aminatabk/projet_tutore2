@extends('layouts.app')

@section('content')

<h2>Nouvelle Réclamation</h2>

<form action="{{ route('reclamations.store') }}"
      method="POST">

@csrf

<div class="mb-3">
    <label class="form-label">Abonné</label>
    <select name="abonne_id" class="form-control" required>
        <option value="">Sélectionner un abonné</option>
        @foreach($abonnes as $abonne)
            <option value="{{ $abonne->id }}">
                {{ $abonne->nom }} {{ $abonne->prenom }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Objet</label>
    <input type="text"
           name="objet"
           class="form-control"
           placeholder="Objet"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description"
              class="form-control"
              placeholder="Description"
              required></textarea>
</div>

<button class="btn btn-success">
    Envoyer
</button>

</form>

@endsection