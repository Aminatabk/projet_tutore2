@extends('layouts.app')

@section('content')

<h2>Gestion des utilisateurs</h2>

<a href="{{ route('users.create') }}"
class="btn btn-primary mb-3">

Ajouter

</a>

<table class="table table-striped">

<thead>

<tr>

<th>ID</th>
<th>Nom</th>
<th>Email</th>
<th>Rôle</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

@foreach($users as $user)

<tr>

<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->role }}</td>

<td>

<a href="{{ route('users.edit', $user->id) }}"
class="btn btn-warning btn-sm">

Modifier

</a>

<form action="{{ route('users.destroy', $user->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button type="submit"
class="btn btn-danger btn-sm">

Supprimer

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection