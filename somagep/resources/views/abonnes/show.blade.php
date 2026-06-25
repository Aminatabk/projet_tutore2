@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Fiche Abonné : {{ $abonne->nom }} {{ $abonne->prenom }}</h2>
    <a href="{{ route('abonnes.index') }}" class="btn btn-secondary">
        Retour à la liste
    </a>
</div>

<div class="card shadow-sm border-0 mb-4">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Informations Personnelles</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Nom :</strong> {{ $abonne->nom }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>Prénom :</strong> {{ $abonne->prenom }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>Email :</strong> {{ $abonne->email }}
            </div>
            <div class="col-md-6 mb-3">
                <strong>Téléphone :</strong> {{ $abonne->telephone }}
            </div>
            <div class="col-md-12">
                <strong>Adresse :</strong> {{ $abonne->adresse ?? 'N/A' }}
            </div>
        </div>
    </div>
</div>

@endsection
