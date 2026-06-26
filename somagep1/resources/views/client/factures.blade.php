@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            Mes factures

        </h2>

        <p class="text-muted mb-0">

            Consultez toutes vos factures d'eau.

        </p>

    </div>

    <span class="badge bg-primary fs-6">

        {{ $factures->count() }} Facture(s)

    </span>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <h5 class="fw-bold mb-0">

            <i class="bi bi-receipt text-primary"></i>

            Historique des factures

        </h5>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>N° Facture</th>

                        <th>Montant</th>

                        <th>Date d'émission</th>

                        <th>Statut</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($factures as $facture)

                    <tr>

                        <td>

                            <span class="fw-bold text-primary">

                                #{{ $facture->id }}

                            </span>

                        </td>

                        <td>

                            <span class="fw-bold text-success">

                                {{ number_format($facture->montant,0,',',' ') }} FCFA

                            </span>

                        </td>

                        <td>

                            {{ \Carbon\Carbon::parse($facture->created_at)->format('d/m/Y') }}

                        </td>

                        <td>

                            @if(($facture->statut ?? '') == 'payee')

                                <span class="badge bg-success">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Payée

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    <i class="bi bi-exclamation-circle-fill"></i>

                                    Impayée

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-5">

                            <i class="bi bi-receipt display-4 text-secondary"></i>

                            <h5 class="mt-3">

                                Aucune facture disponible

                            </h5>

                            <p class="text-muted">

                                Vos factures apparaîtront ici dès leur émission.

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