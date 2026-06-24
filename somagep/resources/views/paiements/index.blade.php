@extends('layouts.app')

@section('content')

<h2>Paiements</h2>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Facture</th>
            <th>Montant</th>
            <th>Mode</th>
            <th>Statut</th>
        </tr>
    </thead>

    <tbody>

        @foreach($paiements as $paiement)

        <tr>

            <td>{{ $paiement->facture_id }}</td>

            <td>{{ $paiement->montant }}</td>

            <td>{{ $paiement->mode }}</td>

            <td>{{ $paiement->statut }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection