@extends('layouts.app')

@section('content')

<h2 class="mb-4">
Modifier une facture
</h2>

<div class="alert alert-info">
    <i class="bi bi-info-circle"></i>
    Numéro et date d'émission ne sont pas modifiables. Le montant est recalculé
    automatiquement si vous changez la consommation liée.
</div>

<form action="{{ route('factures.update',$facture->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Numéro facture</label>
<input type="text" class="form-control" value="{{ $facture->numero_facture }}" disabled>
</div>

<div class="mb-3">

<label>Abonné</label>

<select name="abonne_id" class="form-control" required>

@foreach($abonnes as $abonne)

<option value="{{ $abonne->id }}" {{ $facture->abonne_id == $abonne->id ? 'selected' : '' }}>
{{ $abonne->nom }} {{ $abonne->prenom }}
</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Consommation</label>

<select name="consommation_id" class="form-control" required>

@foreach($consommations as $conso)

<option value="{{ $conso->id }}" {{ $facture->consommation_id == $conso->id ? 'selected' : '' }}>
Consommation #{{ $conso->id }} ({{ $conso->consommation }} m³)
</option>

@endforeach

</select>

</div>

<div class="mb-3">
<label>Montant actuel</label>
<input type="text" class="form-control" value="{{ $facture->montant }} FCFA" disabled>
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
<input type="date" class="form-control" value="{{ $facture->date_emission }}" disabled>
</div>

<div class="mb-3">
<label>Date échéance</label>
<input type="date"
name="date_echeance"
class="form-control"
value="{{ $facture->date_echeance }}"
required>
</div>

<button class="btn btn-primary">

Modifier

</button>

<a href="{{ route('factures.index') }}" class="btn btn-secondary">
    Annuler
</a>

</form>

@endsection