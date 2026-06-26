@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            Mes réclamations

        </h2>

        <p class="text-muted mb-0">

            Suivez l'état de vos demandes envoyées à DJITRAK.

        </p>

    </div>

    <a href="/reclamations/create" class="btn btn-primary rounded-3 px-4">

        <i class="bi bi-plus-circle-fill"></i>

        Nouvelle réclamation

    </a>

</div>

<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-chat-left-text-fill text-primary"></i>

                Historique des réclamations

            </h5>

            <span class="badge bg-primary fs-6">

                {{ $reclamations->count() }} Réclamation(s)

            </span>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>#</th>

                        <th>Sujet</th>

                        <th>Message</th>

                        <th>Statut</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($reclamations as $reclamation)

                    <tr>

                        <td>

                            <span class="fw-bold text-primary">

                                #{{ $reclamation->id }}

                            </span>

                        </td>

                        <td>

                            <strong>

                                {{ $reclamation->objet }}

                            </strong>

                        </td>

                        <td>

                            {{ \Illuminate\Support\Str::limit($reclamation->description,70) }}

                        </td>

                        <td>

                            @php
                                $badge = match($reclamation->statut ?? '') {
                                    'Traitée' => 'bg-success',
                                    'En cours' => 'bg-warning text-dark',
                                    'Rejetée' => 'bg-danger',
                                    default => 'bg-secondary',
                                };
                            @endphp

                            <span class="badge {{ $badge }} px-3 py-2">

                                {{ $reclamation->statut ?? 'En attente' }}

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-5">

                            <i class="bi bi-chat-square-text display-4 text-secondary"></i>

                            <h5 class="mt-3">

                                Aucune réclamation

                            </h5>

                            <p class="text-muted">

                                Vous n'avez encore envoyé aucune réclamation.

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