@extends('layouts.app')

@section('content')

<h2>Modifier un utilisateur</h2>

<form action="{{ route('users.update', $user->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Nom</label>

<input type="text"
name="name"
value="{{ $user->name }}"
class="form-control">

</div>

<div class="mb-3">
<label>Email</label>

<input type="email"
name="email"
value="{{ $user->email }}"
class="form-control">

</div>

<div class="mb-3">
<label>Rôle</label>

<select name="role"
class="form-control">

<option value="admin"
{{ $user->role == 'admin' ? 'selected' : '' }}>
Administrateur
</option>

<option value="agent"
{{ $user->role == 'agent' ? 'selected' : '' }}>
Agent
</option>

</select>

</div>

<button type="submit"
class="btn btn-primary">

Modifier

</button>

</form>

@endsection