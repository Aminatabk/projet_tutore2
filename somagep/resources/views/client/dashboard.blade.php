@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Mon espace client
    </h2>

    <div class="alert alert-info">
        Bienvenue {{ auth()->user()->name }}
    </div>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card card-dashboard">

                <div class="card-body text-center">

                    <h1>
                        {{ App\Models\Facture::count() }}
                    </h1>

                    Mes Factures

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-dashboard">

                <div class="card-body text-center">

                    <h1>
                        {{ App\Models\Consommation::count() }}
                    </h1>

                    Mes Consommations

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card card-dashboard">

                <div class="card-body text-center">

                    <h1>
                        {{ App\Models\Reclamation::count() }}
                    </h1>

                    Mes Réclamations

                </div>

            </div>

        </div>

    </div>

</div>

@endsection