@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            Mes consommations

        </h2>

        <p class="text-muted mb-0">

            Consultez l'historique de votre consommation d'eau.

        </p>

    </div>

    <span class="badge bg-primary fs-6">

        {{ $consommations->count() }} Consommation(s)

    </span>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <h5 class="fw-bold mb-0">

            <i class="bi bi-droplet-half text-primary"></i>

            Historique des consommations

        </h5>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>#</th>

                        <th>Ancien index</th>

                        <th>Nouvel index</th>

                        <th>Consommation</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($consommations as $consommation)

                    <tr>

                        <td>

                            <span class="fw-bold text-primary">

                                #{{ $consommation->id }}

                            </span>

                        </td>

                        <td>

                            {{ $consommation->ancienne_valeur }} m³

                        </td>

                        <td>

                            {{ $consommation->nouvelle_valeur }} m³

                        </td>

                        <td>

                            <span class="badge bg-info text-dark px-3 py-2">

                                <i class="bi bi-droplet-fill"></i>

                                {{ $consommation->consommation }} m³

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-5">

                            <i class="bi bi-droplet display-4 text-secondary"></i>

                            <h5 class="mt-3">

                                Aucune consommation disponible

                            </h5>

                            <p class="text-muted">

                                Vos relevés de consommation apparaîtront ici.

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