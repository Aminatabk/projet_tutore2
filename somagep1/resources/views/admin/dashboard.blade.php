@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Tableau de bord Administrateur
</h2>

<div class="row">

    <!-- Abonnés -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <h1>
                    {{ App\Models\Abonne::count() }}
                </h1>

                <h5>Abonnés</h5>

            </div>

        </div>

    </div>

    <!-- Consommations -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-droplet-fill"></i>
                </div>

                <h1>
                    {{ App\Models\Consommation::count() }}
                </h1>

                <h5>Consommations</h5>

            </div>

        </div>

    </div>

    <!-- Factures -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-receipt"></i>
                </div>

                <h1>
                    {{ App\Models\Facture::count() }}
                </h1>

                <h5>Factures</h5>

            </div>

        </div>

    </div>

    <!-- Utilisateurs -->
    <div class="col-md-3 mb-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <div class="stat-icon">
                    <i class="bi bi-person-badge-fill"></i>
                </div>

                <h1>
                    {{ App\Models\User::count() }}
                </h1>

                <h5>Utilisateurs</h5>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm border-0">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">
            Activités récentes
        </h5>

    </div>

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
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

@endsection