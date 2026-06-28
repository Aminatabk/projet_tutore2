@extends('layouts.app')

@section('content')

<div class="mb-4">

    <h2 class="fw-bold mb-1">

        Mon profil

    </h2>

    <p class="text-muted">

        Consultez les informations de votre compte DJITRAK.

    </p>

</div>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card border-0 shadow rounded-4">

            <div class="card-body p-5">

                <div class="text-center mb-5">

                    <div class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center shadow"
                         style="width:120px;height:120px;font-size:50px;">

                        <i class="bi bi-person-fill"></i>

                    </div>

                    <h3 class="fw-bold mt-3">

                        {{ auth()->user()->name }}

                    </h3>

                    <span class="badge bg-primary px-3 py-2">

                        {{ ucfirst(auth()->user()->role) }}

                    </span>

                </div>

                <div class="row gy-4">

                    <div class="col-md-6">

                        <label class="form-label text-muted">

                            Nom complet

                        </label>

                        <div class="form-control bg-light">

                            {{ auth()->user()->name }}

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label text-muted">

                            Adresse e-mail

                        </label>

                        <div class="form-control bg-light">

                            {{ auth()->user()->email }}

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label text-muted">

                            Rôle

                        </label>

                        <div class="form-control bg-light">

                            {{ ucfirst(auth()->user()->role) }}

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label text-muted">

                            Statut du compte

                        </label>

                        <div class="form-control bg-light text-success fw-bold">

                            <i class="bi bi-check-circle-fill"></i>

                            Actif

                        </div>

                    </div>

                </div>

                <hr class="my-5">

                @if($abonne)

                    <h5 class="fw-bold mb-3">

                        <i class="bi bi-droplet-fill text-primary"></i>
                        Fiche abonné

                    </h5>

                    <div class="row gy-4">

                        <div class="col-md-6">

                            <label class="form-label text-muted">
                                Nom / Prénom
                            </label>

                            <div class="form-control bg-light">
                                {{ $abonne->nom }} {{ $abonne->prenom }}
                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label text-muted">
                                Téléphone
                            </label>

                            <div class="form-control bg-light">
                                {{ $abonne->telephone }}
                            </div>

                        </div>

                        <div class="col-md-12">

                            <label class="form-label text-muted">
                                Adresse
                            </label>

                            <div class="form-control bg-light">
                                {{ $abonne->adresse }}
                            </div>

                        </div>

                    </div>

                @else

                    <div class="alert alert-warning rounded-3 shadow-sm">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                        Votre compte n'est pas encore lié à une fiche abonné. Contactez
                        l'administration pour accéder à toutes vos données (factures,
                        consommations, réclamations).

                    </div>

                @endif

                <div class="text-center mt-5">

                    <button class="btn btn-outline-primary px-4" disabled>

                        <i class="bi bi-pencil-square"></i>

                        Modifier le profil (bientôt disponible)

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection