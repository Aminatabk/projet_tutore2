@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold">Tableau de bord</h2>
        <p class="text-muted">
            Bienvenue dans le système de gestion SOMAGEP
        </p>
    </div>
</div>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold text-primary">
                    {{ App\Models\Abonne::count() }}
                </h1>
                <h5>Abonnés</h5>
                <p class="text-muted">
                    Nombre total d'abonnés enregistrés
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold text-success">
                    {{ App\Models\Facture::count() }}
                </h1>
                <h5>Factures</h5>
                <p class="text-muted">
                    Nombre total de factures générées
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <h1 class="display-4 fw-bold text-warning">
                    {{ App\Models\Paiement::count() }}
                </h1>
                <h5>Paiements</h5>
                <p class="text-muted">
                    Paiements enregistrés dans le système
                </p>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">

    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">

                <h4 class="mb-3">
                    Aperçu du système
                </h4>

                <p>
                    Cette plateforme permet la gestion des abonnés,
                    des consommations, des factures, des paiements,
                    des réclamations et des utilisateurs de la SOMAGEP.
                </p>

            </div>
        </div>
    </div>

</div>

@endsection