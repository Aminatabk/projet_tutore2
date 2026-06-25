@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Détail de la Consommation</h2>
    <a href="{{ route('consommations.index') }}" class="btn btn-secondary">
        Retour à la liste
    </a>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-info text-white">
        <h5 class="mb-0">Détails</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Abonné :</strong> {{ $consommation->abonne->nom ?? 'N/A' }} {{ $consommation->abonne->prenom ?? '' }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>Ancien index :</strong> {{ $consommation->ancienne_valeur }} m³
            </div>
            <div class="col-md-6 mb-3">
                <strong>Nouvel index :</strong> {{ $consommation->nouvelle_valeur }} m³
            </div>
            <div class="col-md-6 mb-3">
                <strong>Consommation totale :</strong> {{ $consommation->consommation }} m³
            </div>
        </div>
    </div>
</div>

@endsection
