@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Détail de la Réclamation</h2>
    <a href="{{ route('reclamations.index') }}" class="btn btn-secondary">
        Retour à la liste
    </a>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-danger text-white">
        <h5 class="mb-0">Détails de la réclamation</h5>
    </div>
    <div class="card-body">
        <div class="row text-dark">
            <div class="col-md-6 mb-3">
                <strong>Abonné :</strong> {{ $reclamation->abonne->nom ?? 'N/A' }} {{ $reclamation->abonne->prenom ?? '' }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>Objet :</strong> {{ $reclamation->objet }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>Statut :</strong> 
                <span class="badge bg-warning text-dark">{{ $reclamation->statut }}</span>
            </div>
            <div class="col-md-6 mb-3">
                <strong>Date de création :</strong> {{ $reclamation->date_reclamation }}
            </div>
            <div class="col-md-12">
                <strong>Description :</strong>
                <p class="mt-2 p-3 bg-light border rounded">{{ $reclamation->description }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
