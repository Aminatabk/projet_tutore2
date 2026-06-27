@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-7">

        <div class="text-center mb-4">

            <div class="display-3">

                💳

            </div>

            <h2 class="fw-bold">

                Paiement d'une facture

            </h2>

            <p class="text-muted">

                Choisissez la facture à régler et votre moyen de paiement.

            </p>

        </div>

        @if($factures->isEmpty())

            <div class="alert alert-warning border-0 rounded-4 shadow-sm">

                <i class="bi bi-exclamation-triangle-fill"></i>

                Aucune facture en attente de paiement n'est disponible pour le moment.

            </div>

        @else

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-5">

                <form action="/paiement" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="bi bi-receipt text-primary"></i>

                            Facture à payer

                        </label>

                        <select name="facture_id"
                                id="facture_id"
                                class="form-select form-select-lg"
                                required
                                onchange="document.getElementById('montant_affiche').value = this.options[this.selectedIndex].dataset.montant + ' FCFA'">

                            <option value="" disabled selected>-- Choisir une facture --</option>

                            @foreach($factures as $facture)

                                <option value="{{ $facture->id }}" data-montant="{{ $facture->montant }}">
                                    {{ $facture->numero_facture }} - {{ number_format($facture->montant,0,',',' ') }} FCFA
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="bi bi-cash-stack text-primary"></i>

                            Montant à payer

                        </label>

                        <input
                            type="text"
                            id="montant_affiche"
                            class="form-control form-control-lg"
                            value=""
                            readonly
                            placeholder="Sélectionnez une facture">

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="bi bi-wallet2 text-primary"></i>

                            Mode de paiement

                        </label>

                        <select name="mode" class="form-select form-select-lg" required>

                            <option value="Orange Money">Orange Money</option>
                            <option value="Moov Money">Moov Money</option>

                        </select>

                    </div>

                    <div class="alert alert-info border-0">

                        <i class="bi bi-info-circle-fill"></i>

                        Après validation, votre paiement sera enregistré immédiatement.

                    </div>

                    <div class="d-grid">

                        <button class="btn btn-success btn-lg rounded-3">

                            <i class="bi bi-credit-card-fill"></i>

                            Payer maintenant

                        </button>

                    </div>

                </form>

            </div>

        </div>

        @endif

    </div>

</div>

@endsection