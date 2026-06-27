@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Gestion des factures
        </h2>

        <p class="text-muted mb-0">
            Consultez et gérez toutes les factures des abonnés.
        </p>

    </div>

    <a href="{{ route('factures.create') }}" class="btn btn-primary rounded-3 px-4">

        <i class="bi bi-plus-circle-fill"></i>

        Nouvelle facture

    </a>

</div>

@if(session('success'))

<div class="alert alert-success rounded-3 shadow-sm">

    <i class="bi bi-check-circle-fill"></i>

    {{ session('success') }}

</div>

@endif

<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-receipt text-primary"></i>

                Liste des factures

            </h5>

            <span class="badge bg-primary fs-6">

                {{ $factures->count() }} Facture(s)

            </span>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                <tr>

                    <th>N° Facture</th>

                    <th>Abonné</th>

                    <th>Montant</th>

                    <th>Statut</th>

                    <th class="text-center">

                        Actions

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($factures as $facture)

                <tr>

                    <td>

                        <span class="fw-bold text-primary">

                            {{ $facture->numero_facture }}

                        </span>

                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-3"
                                 style="width:45px;height:45px;">

                                <i class="bi bi-person-fill"></i>

                            </div>

                            <div>

                                <strong>

                                    {{ $facture->abonne->nom ?? '-' }}

                                </strong>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span class="fw-bold text-success">

                            {{ number_format($facture->montant,0,',',' ') }} FCFA

                        </span>

                    </td>

                    <td>

                        @if($facture->statut == 'Payée')

                            <span class="badge bg-success">

                                <i class="bi bi-check-circle-fill"></i>

                                Payée

                            </span>

                        @else

                            <span class="badge bg-danger">

                                <i class="bi bi-x-circle-fill"></i>

                                Non payée

                            </span>

                        @endif

                    </td>

                    <td class="text-center">

                        <a href="{{ route('factures.show',$facture->id) }}"
                           class="btn btn-info btn-sm rounded-circle">

                            <i class="bi bi-eye-fill"></i>

                        </a>

                        <a href="{{ route('factures.edit',$facture->id) }}"
                           class="btn btn-warning btn-sm rounded-circle">

                            <i class="bi bi-pencil-fill"></i>

                        </a>

                        <form action="{{ route('factures.destroy',$facture->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm rounded-circle"
                                    onclick="return confirm('Supprimer cette facture ?')">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-5">

                        <i class="bi bi-receipt-cutoff display-4 text-secondary"></i>

                        <h5 class="mt-3">

                            Aucune facture disponible

                        </h5>

                        <p class="text-muted">

                            Commencez par créer une nouvelle facture.

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