@extends('layouts.app')

@section('content')

<h2>Effectuer un Paiement</h2>

<form action="/paiement" method="POST">

    @csrf

    <div class="mb-3">

        <label>Facture</label>

        <select name="facture_id"
                class="form-control">

            @foreach($factures as $facture)

            <option value="{{ $facture->id }}">
                {{ $facture->numero_facture }}
            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <input type="number"
               name="montant"
               class="form-control"
               placeholder="Montant">

    </div>

    <div class="mb-3">

        <select name="mode"
                class="form-control">

            <option>
                Orange Money
            </option>

            <option>
                Moov Money
            </option>

        </select>

    </div>

    <button class="btn btn-success">
        Valider
    </button>

</form>

@endsection