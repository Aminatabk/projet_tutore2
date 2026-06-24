@extends('layouts.app')

@section('content')

<h2>Liste des Consommations</h2>

<a href="/consommations/create" class="btn btn-primary mb-3">
    Nouveau relevé
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Abonné</th>
            <th>Ancienne Valeur</th>
            <th>Nouvelle Valeur</th>
            <th>Consommation</th>
        </tr>
    </thead>

    <tbody>
        @foreach($consommations as $conso)
        <tr>
            <td>{{ $conso->id }}</td>
            <td>{{ $conso->abonne->nom }}</td>
            <td>{{ $conso->ancienne_valeur }}</td>
            <td>{{ $conso->nouvelle_valeur }}</td>
            <td>{{ $conso->consommation }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection