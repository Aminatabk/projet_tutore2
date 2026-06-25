@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Mon Profil
</h2>

<div class="card">

    <div class="card-body">

        <p>
            <strong>Nom :</strong>
            {{ auth()->user()->name }}
        </p>

        <p>
            <strong>Email :</strong>
            {{ auth()->user()->email }}
        </p>

        <p>
            <strong>Rôle :</strong>
            {{ auth()->user()->role }}
        </p>

    </div>

</div>

@endsection