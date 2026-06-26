@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Paiements</h2>

    <a href="{{ route('paiements.create') }}" class="btn btn-primary">
        Nouveau paiement
    </a>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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

        @forelse($paiements as $paiement)

        <tr>

            <td>{{ $paiement->facture->numero_facture ?? $paiement->facture_id }}</td>

            <td>{{ $paiement->montant }}</td>

            <td>{{ $paiement->mode }}</td>

            <td>{{ $paiement->statut }}</td>

        </tr>

        @empty

        <tr>
            <td colspan="4" class="text-center">Aucun paiement enregistré</td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection
