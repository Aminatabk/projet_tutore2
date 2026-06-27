@extends('layouts.app')

@section('content')

<h2>Effectuer un Paiement</h2>

@if($factures->isEmpty())

    <div class="alert alert-warning">
        Aucune facture en attente de paiement n'est disponible pour le moment.
    </div>

@else

<form action="/paiement" method="POST">

    @csrf

    <div class="mb-3">

        <label>Facture</label>

        <select name="facture_id"
                id="facture_id"
                class="form-control"
                required
                onchange="document.getElementById('montant_affiche').value = this.options[this.selectedIndex].dataset.montant">

            <option value="" disabled selected>-- Choisir une facture --</option>

            @foreach($factures as $facture)

            <option value="{{ $facture->id }}" data-montant="{{ $facture->montant }}">
                {{ $facture->numero_facture }} - {{ $facture->abonne->nom ?? '' }} ({{ $facture->montant }} FCFA)
            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Montant à payer</label>

        <input type="text"
               id="montant_affiche"
               class="form-control"
               value=""
               readonly
               placeholder="Sélectionnez une facture">

    </div>

    <div class="mb-3">

        <label>Mode de paiement</label>

        <select name="mode"
                class="form-control"
                required>

            <option value="Orange Money">
                Orange Money
            </option>

            <option value="Moov Money">
                Moov Money
            </option>

        </select>

    </div>

    <button class="btn btn-success">
        Valider
    </button>

</form>

@endif

@endsection