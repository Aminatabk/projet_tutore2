@extends('layouts.app')

@section('content')

<h2 class="mb-4">Détails de la réclamation</h2>

<table class="table table-bordered">

    <tr>
        <th>Abonné</th>
        <td>{{ $reclamation->abonne->nom ?? 'N/A' }}</td>
    </tr>
    <tr>
        <th>Objet</th>
        <td>{{ $reclamation->objet }}</td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{ $reclamation->description }}</td>
    </tr>
    <tr>
        <th>Statut</th>
        <td>
            <span class="badge bg-warning">{{ $reclamation->statut }}</span>
        </td>
    </tr>
    <tr>
        <th>Date</th>
        <td>{{ $reclamation->date_reclamation }}</td>
    </tr>

</table>

<a href="{{ route('reclamations.edit', $reclamation->id) }}" class="btn btn-warning">
    Modifier
</a>

<a href="{{ route('reclamations.index') }}" class="btn btn-secondary">
    Retour
</a>

@endsection
