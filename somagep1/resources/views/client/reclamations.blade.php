@extends('layouts.app')

@section('content')

<h2 class="mb-4">Mes Réclamations</h2>

<a href="/reclamations/create" class="btn btn-primary mb-3">
    Nouvelle Réclamation
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Sujet</th>
            <th>Message</th>
        </tr>
    </thead>

    <tbody>

    @foreach($reclamations as $reclamation)

        <tr>
            <td>{{ $reclamation->id }}</td>
            <td>{{ $reclamation->objet }}</td>
            <td>{{ $reclamation->description }}</td>
        </tr>

    @endforeach

    </tbody>

</table>

@endsection