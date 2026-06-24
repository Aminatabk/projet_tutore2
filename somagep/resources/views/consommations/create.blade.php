@extends('layouts.app')

@section('content')

<h2>Nouveau Relevé</h2>

<form action="/consommations" method="POST">

    @csrf

    <div class="mb-3">
        <label>Abonné</label>

        <select name="abonne_id" class="form-control">

            @foreach($abonnes as $abonne)

            <option value="{{ $abonne->id }}">
                {{ $abonne->nom }}
            </option>

            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <input type="number"
               name="ancienne_valeur"
               class="form-control"
               placeholder="Ancienne valeur">
    </div>

    <div class="mb-3">
        <input type="number"
               name="nouvelle_valeur"
               class="form-control"
               placeholder="Nouvelle valeur">
    </div>

    <button class="btn btn-success">
        Enregistrer
    </button>

</form>

@endsection