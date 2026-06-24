@extends('layouts.app')

@section('content')

<h2>Gestion des abonnés</h2>

<a href="/abonnes/create"
class="btn btn-primary mb-3">

Ajouter

</a>

<table class="table table-striped">

<thead>

<tr>

<th>ID</th>
<th>Nom</th>
<th>Email</th>
<th>Téléphone</th>

</tr>

</thead>

<tbody>

@foreach($abonnes as $abonne)

<tr>

<td>{{ $abonne->id }}</td>
<td>{{ $abonne->nom }}</td>
<td>{{ $abonne->email }}</td>
<td>{{ $abonne->telephone }}</td>

</tr>

@endforeach

</tbody>

</table>

@endsection