@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Statistiques et Rapports
</h2>

<div class="row g-4 mb-4">

    <div class="col-md-3">
        <div class="card card-dashboard text-center p-3">
            <div class="stat-icon text-primary">
                <i class="bi bi-people-fill"></i>
            </div>
            <h3>{{ $totalAbonnes }}</h3>
            <p class="text-muted mb-0">Abonnés</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-dashboard text-center p-3">
            <div class="stat-icon text-info">
                <i class="bi bi-droplet-fill"></i>
            </div>
            <h3>{{ $totalConsommations }}</h3>
            <p class="text-muted mb-0">Relevés de consommation</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-dashboard text-center p-3">
            <div class="stat-icon text-success">
                <i class="bi bi-receipt"></i>
            </div>
            <h3>{{ $totalFactures }}</h3>
            <p class="text-muted mb-0">Factures émises</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-dashboard text-center p-3">
            <div class="stat-icon text-warning">
                <i class="bi bi-cash-coin"></i>
            </div>
            <h3>{{ $totalPaiements }}</h3>
            <p class="text-muted mb-0">Paiements enregistrés</p>
        </div>
    </div>

</div>

<div class="row g-4">

    <div class="col-md-6">

        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                Suivi des factures
            </div>

            <div class="card-body">

                <table class="table mb-0">

                    <tr>
                        <td>Factures payées</td>
                        <td class="text-end">
                            <span class="badge bg-success">{{ $facturesPayees }}</span>
                        </td>
                    </tr>

                    <tr>
                        <td>Factures non payées</td>
                        <td class="text-end">
                            <span class="badge bg-danger">{{ $facturesNonPayees }}</span>
                        </td>
                    </tr>

                    <tr>
                        <td>Montant total facturé</td>
                        <td class="text-end">{{ number_format($montantTotalFacture, 0, ',', ' ') }} FCFA</td>
                    </tr>

                    <tr>
                        <td>Montant total encaissé</td>
                        <td class="text-end text-success">{{ number_format($montantTotalPaye, 0, ',', ' ') }} FCFA</td>
                    </tr>

                    <tr>
                        <td>Montant restant à encaisser</td>
                        <td class="text-end text-danger">{{ number_format($montantTotalImpaye, 0, ',', ' ') }} FCFA</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card shadow-sm">

            <div class="card-header bg-warning">
                Réclamations par statut
            </div>

            <div class="card-body">

                @if($reclamationsParStatut->isEmpty())

                    <p class="text-muted mb-0">Aucune réclamation enregistrée</p>

                @else

                    <table class="table mb-0">

                        @foreach($reclamationsParStatut as $statut => $total)

                        <tr>
                            <td>{{ $statut }}</td>
                            <td class="text-end">
                                <span class="badge bg-secondary">{{ $total }}</span>
                            </td>
                        </tr>

                        @endforeach

                    </table>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection