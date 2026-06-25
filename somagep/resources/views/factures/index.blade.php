@extends('layouts.app')

@section('content')

<h2>Liste des factures</h2>

<a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">
    Nouvelle facture
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>N°</th>
            <th>Abonné</th>
            <th>Montant</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($factures as $facture)
        <tr>
            <td>{{ $facture->numero_facture }}</td>
            <td>{{ $facture->abonne->nom ?? '-' }}</td>
            <td>{{ $facture->montant }}</td>
            <td>{{ $facture->statut }}</td>
            <td>
                <a href="{{ route('factures.show', $facture->id) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('factures.edit', $facture->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                <form action="{{ route('factures.destroy', $facture->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Supprimer
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection