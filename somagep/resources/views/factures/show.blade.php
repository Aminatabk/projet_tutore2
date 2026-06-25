@extends('layouts.app')

@section('content')

<h2>Détails de la facture</h2>

<table class="table table-bordered">

<tr>

<th>Numéro</th>

<td>{{ $facture->numero_facture }}</td>

</tr>

<tr>

<th>Abonné</th>

<td>{{ $facture->abonne->nom }}</td>

</tr>

<tr>

<th>Montant</th>

<td>{{ $facture->montant }} FCFA</td>

</tr>

<tr>

<th>Statut</th>

<td>{{ $facture->statut }}</td>

</tr>

<tr>

<th>Date émission</th>

<td>{{ $facture->date_emission }}</td>

</tr>

<tr>

<th>Date échéance</th>

<td>{{ $facture->date_echeance }}</td>

</tr>

</table>

<a
href="{{ route('factures.index') }}"
class="btn btn-secondary">

Retour

</a>

@endsection