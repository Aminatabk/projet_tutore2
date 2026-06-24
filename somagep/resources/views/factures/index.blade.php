@extends('layouts.app')

@section('content')

<h2>Liste des Factures</h2>

<table class="table table-striped">

    <thead>
        <tr>
            <th>N° Facture</th>
            <th>Abonné</th>
            <th>Montant</th>
            <th>Statut</th>
        </tr>
    </thead>

    <tbody>

        @foreach($factures as $facture)

        <tr>

            <td>{{ $facture->numero_facture }}</td>

            <td>{{ $facture->abonne->nom }}</td>

            <td>{{ $facture->montant }} FCFA</td>

            <td>{{ $facture->statut }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection