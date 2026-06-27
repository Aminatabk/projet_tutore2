@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Tableau de bord DJITRAK
        </h2>

        <p class="text-secondary mb-0">
            Bienvenue {{ Auth::user()->name }}, voici un aperçu de votre système.
        </p>
    </div>

    <div class="text-end">
        <small class="text-muted">
            {{ now()->format('d/m/Y') }}
        </small>
    </div>

</div>

<div class="row g-4">

    <!-- Abonnés -->
    <div class="col-lg-3 col-md-6">

        <div class="card card-dashboard">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">
                            Abonnés
                        </small>

                        <h2 class="fw-bold mt-2">
                            {{ App\Models\Abonne::count() }}
                        </h2>

                    </div>

                    <div class="bg-primary text-white rounded-circle p-3">

                        <i class="bi bi-people-fill fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Consommations -->

    <div class="col-lg-3 col-md-6">

        <div class="card card-dashboard">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">
                            Consommations
                        </small>

                        <h2 class="fw-bold mt-2">
                            {{ App\Models\Consommation::count() }}
                        </h2>

                    </div>

                    <div class="bg-info text-white rounded-circle p-3">

                        <i class="bi bi-droplet-fill fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Factures -->

    <div class="col-lg-3 col-md-6">

        <div class="card card-dashboard">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">
                            Factures
                        </small>

                        <h2 class="fw-bold mt-2">
                            {{ App\Models\Facture::count() }}
                        </h2>

                    </div>

                    <div class="bg-warning text-white rounded-circle p-3">

                        <i class="bi bi-receipt fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Utilisateurs -->

    <div class="col-lg-3 col-md-6">

        <div class="card card-dashboard">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-secondary">
                            Utilisateurs
                        </small>

                        <h2 class="fw-bold mt-2">
                            {{ App\Models\User::count() }}
                        </h2>

                    </div>

                    <div class="bg-success text-white rounded-circle p-3">

                        <i class="bi bi-person-badge-fill fs-3"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0">

                <h5 class="fw-bold mb-0">

                    <i class="bi bi-clock-history text-primary"></i>

                    Derniers abonnés

                </h5>

            </div>

            <div class="card-body p-0">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Nom</th>

                            <th>Email</th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach(App\Models\Abonne::latest()->take(5)->get() as $abonne)

                        <tr>

                            <td>{{ $abonne->id }}</td>

                            <td>

                                <strong>{{ $abonne->nom }}</strong>

                            </td>

                            <td>{{ $abonne->email }}</td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body text-center">

                <div class="display-4 text-primary mb-3">

                    💧

                </div>

                <h4 class="fw-bold">

                    DJITRAK

                </h4>

                <p class="text-secondary">

                    Plateforme intelligente de gestion des abonnés, consommations, factures et paiements.

                </p>

                <hr>

                <div class="row text-center">

                    <div class="col-6">

                        <h5 class="fw-bold text-primary">

                            {{ App\Models\Abonne::count() }}

                        </h5>

                        <small>Abonnés</small>

                    </div>

                    <div class="col-6">

                        <h5 class="fw-bold text-success">

                            {{ App\Models\Facture::count() }}

                        </h5>

                        <small>Factures</small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection