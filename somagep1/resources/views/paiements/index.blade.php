@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Gestion des paiements
        </h2>

        <p class="text-muted mb-0">
            Consultez tous les paiements enregistrés dans DJITRAK.
        </p>

    </div>

    <a href="{{ route('paiements.create') }}" class="btn btn-primary rounded-3 px-4">

        <i class="bi bi-credit-card-fill"></i>

        Nouveau paiement

    </a>

</div>

@if(session('success'))

<div class="alert alert-success shadow-sm rounded-3">

    <i class="bi bi-check-circle-fill me-2"></i>

    {{ session('success') }}

</div>

@endif

<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-wallet2 text-primary"></i>

                Historique des paiements

            </h5>

            <span class="badge bg-primary fs-6">

                {{ $paiements->count() }} Paiement(s)

            </span>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>Facture</th>

                        <th>Montant</th>

                        <th>Mode de paiement</th>

                        <th>Statut</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($paiements as $paiement)

                    <tr>

                        <td>

                            <span class="fw-bold text-primary">

                                {{ $paiement->facture->numero_facture ?? $paiement->facture_id }}

                            </span>

                        </td>

                        <td>

                            <span class="fw-bold text-success">

                                {{ number_format($paiement->montant,0,',',' ') }} FCFA

                            </span>

                        </td>

                        <td>

                            @if($paiement->mode == 'Orange Money')

                                <span class="badge bg-warning text-dark">

                                    🟠 Orange Money

                                </span>

                            @elseif($paiement->mode == 'Moov Money')

                                <span class="badge bg-primary">

                                    🔵 Moov Money

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    {{ $paiement->mode }}

                                </span>

                            @endif

                        </td>

                        <td>

                            @if($paiement->statut == 'Validé')

                                <span class="badge bg-success">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Validé

                                </span>

                            @elseif($paiement->statut == 'En attente')

                                <span class="badge bg-warning text-dark">

                                    <i class="bi bi-clock-fill"></i>

                                    En attente

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    <i class="bi bi-x-circle-fill"></i>

                                    Échoué

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-5">

                            <i class="bi bi-wallet2 display-4 text-secondary"></i>

                            <h5 class="mt-3">

                                Aucun paiement enregistré

                            </h5>

                            <p class="text-muted">

                                Les paiements effectués apparaîtront ici.

                            </p>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection