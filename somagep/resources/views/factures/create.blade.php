@extends('layouts.app')

@section('content')

<h2 class="mb-4">
Nouvelle facture
</h2>

<form action="{{ route('factures.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Numéro facture</label>

<input
type="text"
name="numero_facture"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Abonné</label>

<select
name="abonne_id"
class="form-control">

@foreach($abonnes as $abonne)

<option value="{{ $abonne->id }}">

{{ $abonne->nom }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Consommation</label>

<select
name="consommation_id"
class="form-control">

@foreach($consommations as $conso)

<option value="{{ $conso->id }}">

Consommation #{{ $conso->id }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Montant</label>

<input
type="number"
step="0.01"
name="montant"
class="form-control">

</div>

<div class="mb-3">

<label>Statut</label>

<select
name="statut"
class="form-control">

<option>Non payée</option>

<option>Payée</option>

</select>

</div>

<div class="mb-3">

<label>Date émission</label>

<input
type="date"
name="date_emission"
class="form-control">

</div>

<div class="mb-3">

<label>Date échéance</label>

<input
type="date"
name="date_echeance"
class="form-control">

</div>

<button class="btn btn-success">

Enregistrer

</button>

</form>

@endsection