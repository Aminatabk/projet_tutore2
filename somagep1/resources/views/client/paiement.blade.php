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

                Renseignez l'identifiant de votre facture pour effectuer votre paiement.

            </p>

        </div>

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-5">

                <form action="/paiement" method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="bi bi-receipt text-primary"></i>

                            Numéro / ID de la facture

                        </label>

                        <input
                            type="number"
                            name="facture_id"
                            class="form-control form-control-lg"
                            placeholder="Ex : 125"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label fw-semibold">

                            <i class="bi bi-wallet2 text-primary"></i>

                            Mode de paiement

                        </label>

                        <select class="form-select form-select-lg" disabled>

                            <option selected>Orange Money</option>
                            <option>Moov Money</option>

                        </select>

                        <small class="text-muted">

                            (Aperçu de l'interface - le backend reste inchangé.)

                        </small>

                    </div>

                    <div class="alert alert-info border-0">

                        <i class="bi bi-info-circle-fill"></i>

                        Après validation, votre demande de paiement sera enregistrée.

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

    </div>

</div>

@endsection