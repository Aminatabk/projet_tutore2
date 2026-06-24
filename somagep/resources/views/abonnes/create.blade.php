@extends('layouts.app')

@section('content')

<h2>Nouvel abonné</h2>

<form action="/abonnes" method="POST">

@csrf

<input
type="text"
name="nom"
class="form-control mb-3"
placeholder="Nom">

<input
type="text"
name="prenom"
class="form-control mb-3"
placeholder="Prénom">

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Email">

<input
type="text"
name="telephone"
class="form-control mb-3"
placeholder="Téléphone">

<textarea
name="adresse"
class="form-control mb-3"
placeholder="Adresse">
</textarea>

<button class="btn btn-success">

Enregistrer

</button>

</form>

@endsection