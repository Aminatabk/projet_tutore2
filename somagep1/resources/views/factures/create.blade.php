@extends('layouts.app')

@section('content')

<h2 class="mb-4">
Nouvelle facture
</h2>

<div class="alert alert-info">
    <i class="bi bi-info-circle"></i>
    Le numéro de facture, la date d'émission et le montant sont calculés automatiquement
    à partir de la consommation sélectionnée.
</div>

<form action="{{ route('factures.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Abonné</label>

<select
name="abonne_id"
class="form-control"
required>

<option value="" disabled selected>-- Choisir un abonné --</option>

@foreach($abonnes as $abonne)

<option value="{{ $abonne->id }}">

{{ $abonne->nom }} {{ $abonne->prenom }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Consommation</label>

<select
name="consommation_id"
class="form-control"
required>

<option value="" disabled selected>-- Choisir une consommation --</option>

@foreach($consommations as $conso)

<option value="{{ $conso->id }}">

Consommation #{{ $conso->id }} ({{ $conso->consommation }} m³ - {{ $conso->abonne->nom ?? '' }})

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Date échéance</label>

<input
type="date"
name="date_echeance"
class="form-control"
required>

</div>

<button class="btn btn-success">

Générer la facture

</button>

<a href="{{ route('factures.index') }}" class="btn btn-secondary">
    Annuler
</a>

</form>

@endsection