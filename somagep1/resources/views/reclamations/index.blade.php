@extends('layouts.app')
@php
use Illuminate\Support\Str;
@endphp
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Gestion des réclamations
        </h2>

        <p class="text-muted mb-0">
            Consultez et traitez les réclamations des abonnés.
        </p>

    </div>

    <a href="{{ route('reclamations.create') }}"
       class="btn btn-primary rounded-3 px-4">

        <i class="bi bi-plus-circle-fill"></i>

        Nouvelle réclamation

    </a>

</div>


<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-chat-left-text-fill text-primary"></i>

                Liste des réclamations

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

                        <th>Description</th>

                        <th>Statut</th>

                        <th class="text-center">

                            Actions

                        </th>

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

                        {{ Str::limit($reclamation->description,60) }}

                    </td>

                    <td>

                        @php

                            $badgeClass = match($reclamation->statut){

                                'Traitée' => 'bg-success',

                                'En cours' => 'bg-warning text-dark',

                                'Rejetée' => 'bg-danger',

                                default => 'bg-secondary',

                            };

                        @endphp

                        <span class="badge {{ $badgeClass }} px-3 py-2">

                            {{ $reclamation->statut }}

                        </span>

                    </td>

                    <td class="text-center">

                        <a href="{{ route('reclamations.show',$reclamation->id) }}"
                           class="btn btn-info btn-sm rounded-circle"
                           title="Voir">

                            <i class="bi bi-eye-fill"></i>

                        </a>

                        <a href="{{ route('reclamations.edit',$reclamation->id) }}"
                           class="btn btn-warning btn-sm rounded-circle"
                           title="Modifier">

                            <i class="bi bi-pencil-fill"></i>

                        </a>

                        <form action="{{ route('reclamations.encours',$reclamation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-primary btn-sm rounded-circle"
                                    title="En cours">

                                <i class="bi bi-arrow-repeat"></i>

                            </button>

                        </form>

                        <form action="{{ route('reclamations.traiter',$reclamation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-success btn-sm rounded-circle"
                                    title="Traiter">

                                <i class="bi bi-check-lg"></i>

                            </button>

                        </form>

                        <form action="{{ route('reclamations.rejeter',$reclamation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-secondary btn-sm rounded-circle"
                                    title="Rejeter"
                                    onclick="return confirm('Rejeter cette réclamation ?')">

                                <i class="bi bi-x-lg"></i>

                            </button>

                        </form>

                        <form action="{{ route('reclamations.destroy',$reclamation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm rounded-circle"
                                    onclick="return confirm('Supprimer cette réclamation ?')">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-5">

                        <i class="bi bi-chat-square-text display-4 text-secondary"></i>

                        <h5 class="mt-3">

                            Aucune réclamation trouvée

                        </h5>

                        <p class="text-muted">

                            Les nouvelles réclamations apparaîtront ici.

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