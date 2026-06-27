@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Espace Agent
</h2>

<div class="row">

    <div class="col-md-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <h3>
                    Mes Factures
                </h3>

                <a href="/mes-factures"
                   class="btn btn-primary">
                    Consulter
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <h3>
                    Ma Consommation
                </h3>

                <a href="/mes-consommations"
                   class="btn btn-success">
                    Consulter
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-dashboard">

            <div class="card-body text-center">

                <h3>
                    Mes Réclamations
                </h3>

                <a href="/mes-reclamations"
                   class="btn btn-warning">
                    Consulter
                </a>

            </div>

        </div>

    </div>

</div>

@endsection