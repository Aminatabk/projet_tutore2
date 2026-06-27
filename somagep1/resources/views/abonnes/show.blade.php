@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Détails de l'abonné</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Nom</th>
                <td>{{ $abonne->nom }}</td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td>{{ $abonne->prenom }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $abonne->email }}</td>
            </tr>
            <tr>
                <th>Téléphone</th>
                <td>{{ $abonne->telephone }}</td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td>{{ $abonne->adresse }}</td>
            </tr>
        </table>

        <a href="{{ route('abonnes.edit', $abonne->id) }}" class="btn btn-warning">
            Modifier
        </a>

        <a href="{{ route('abonnes.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </div>

</div>

@endsection
