@extends('layouts.app')

@section('content')

<h2>Réclamations</h2>

<a href="/reclamations/create"
   class="btn btn-primary mb-3">

   Nouvelle Réclamation

</a>

<table class="table table-striped">

<thead>

<tr>

<th>ID</th>
<th>Objet</th>
<th>Statut</th>

</tr>

</thead>

<tbody>

@foreach($reclamations as $reclamation)

<tr>

<td>{{ $reclamation->id }}</td>

<td>{{ $reclamation->objet }}</td>

<td>{{ $reclamation->statut }}</td>

</tr>

@endforeach

</tbody>

</table>

@endsection