@extends('layouts.app')

@section('content')

<h2>Nouvelle Réclamation</h2>

<form action="/reclamations"
      method="POST">

@csrf

<div class="mb-3">

<input
type="text"
name="objet"
class="form-control"
placeholder="Objet">

</div>

<div class="mb-3">

<textarea
name="description"
class="form-control"
placeholder="Description">
</textarea>

</div>

<button class="btn btn-success">

Envoyer

</button>

</form>

@endsection