@extends('layouts.app')

@section('content')

<h2 class="mb-4">
Modifier une facture
</h2>

<form action="{{ route('factures.update',$facture->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Numéro facture</label>
<input type="text" name="numero_facture" class="form-control"
value="{{ $facture->numero_facture }}">
</div>

<div class="mb-3">
<label>Montant</label>
<input type="number"
step="0.01"
name="montant"
class="form-control"
value="{{ $facture->montant }}">
</div>

<div class="mb-3">

<label>Statut</label>

<select
name="statut"
class="form-control">

<option {{ $facture->statut=="Non payée" ? 'selected' : '' }}>
Non payée
</option>

<option {{ $facture->statut=="Payée" ? 'selected' : '' }}>
Payée
</option>

</select>

</div>

<div class="mb-3">
<label>Date émission</label>
<input type="date"
name="date_emission"
class="form-control"
value="{{ $facture->date_emission }}">
</div>

<div class="mb-3">
<label>Date échéance</label>
<input type="date"
name="date_echeance"
class="form-control"
value="{{ $facture->date_echeance }}">
</div>

<button class="btn btn-primary">

Modifier

</button>

</form>

@endsection