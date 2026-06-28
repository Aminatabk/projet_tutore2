@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Bonjour {{ Auth::user()->name }} 👋
        </h2>

        <p class="text-muted mb-0">
            Bienvenue sur votre espace client DJITRAK.
        </p>

    </div>

    <div>

        <span class="badge bg-primary fs-6">

            {{ now()->format('d/m/Y') }}

        </span>

    </div>

</div>

@if(!$abonne)

    <div class="alert alert-warning rounded-3 shadow-sm">

        <i class="bi bi-exclamation-triangle-fill"></i>

        Votre compte n'est pas encore lié à une fiche abonné. Contactez l'administration
        pour accéder à vos factures, consommations et réclamations.

    </div>

@endif

<div class="row g-4">

    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Mes factures

                        </small>

                        <h2 class="fw-bold">

                            {{ $totalFactures }}

                        </h2>

                    </div>

                    <div class="bg-primary text-white rounded-circle p-3">

                        <i class="bi bi-receipt fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Consommations

                        </small>

                        <h2 class="fw-bold">

                            {{ $totalConsommations }}

                        </h2>

                    </div>

                    <div class="bg-info text-white rounded-circle p-3">

                        <i class="bi bi-droplet-fill fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Réclamations

                        </small>

                        <h2 class="fw-bold">

                            {{ $totalReclamations }}

                        </h2>

                    </div>

                    <div class="bg-warning text-white rounded-circle p-3">

                        <i class="bi bi-chat-left-text-fill fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card border-0 shadow rounded-4">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-clock-history text-primary"></i>

                    Mes dernières factures

                </h5>

            </div>

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>N°</th>
                            <th>Montant</th>
                            <th>Statut</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($dernieresFactures as $facture)

                        <tr>

                            <td>{{ $facture->numero_facture }}</td>

                            <td class="fw-bold text-success">

                                {{ number_format($facture->montant,0,',',' ') }} FCFA

                            </td>

                            <td>

                                @if($facture->statut == 'Payée')

                                    <span class="badge bg-success">

                                        Payée

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Non payée

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center py-4 text-muted">

                                Aucune facture disponible.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body text-center">

                <div class="display-3">

                    💧

                </div>

                <h4 class="fw-bold">

                    DJITRAK

                </h4>

                <p class="text-muted">

                    Consultez vos factures, suivez votre consommation et effectuez vos paiements en toute simplicité.

                </p>

                <a href="{{ route('client.factures') }}" class="btn btn-primary w-100">

                    Voir mes factures

                </a>

            </div>

        </div>

    </div>

</div>

@endsection