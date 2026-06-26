@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Gestion des abonnés
        </h2>

        <p class="text-muted mb-0">
            Gérez les abonnés enregistrés dans le système DJITRAK.
        </p>

    </div>

    <a href="{{ route('abonnes.create') }}" class="btn btn-primary rounded-3 px-4">

        <i class="bi bi-person-plus-fill"></i>

        Nouvel abonné

    </a>

</div>


<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-body">

        <form action="{{ route('abonnes.index') }}" method="GET">

            <div class="row g-3">

                <div class="col-md-10">

                    <input
                        type="text"
                        name="q"
                        value="{{ $recherche ?? '' }}"
                        class="form-control form-control-lg rounded-3"
                        placeholder="Rechercher un abonné..."
                    >

                </div>

                <div class="col-md-2 d-grid">

                    <button class="btn btn-primary rounded-3">

                        <i class="bi bi-search"></i>

                        Rechercher

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-people-fill text-primary"></i>

                Liste des abonnés

            </h5>

            <span class="badge bg-primary fs-6">

                {{ $abonnes->count() }} Abonné(s)

            </span>

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                <tr>

                    <th>#</th>

                    <th>Abonné</th>

                    <th>Email</th>

                    <th>Téléphone</th>

                    <th>Adresse</th>

                    <th class="text-center">
                        Actions
                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($abonnes as $abonne)

                    <tr>

                        <td>

                            <span class="fw-bold text-primary">

                                #{{ $abonne->id }}

                            </span>

                        </td>

                        <td>

                            <div class="d-flex align-items-center">

                                <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center me-3"
                                     style="width:45px;height:45px;">

                                    <i class="bi bi-person-fill"></i>

                                </div>

                                <div>

                                    <div class="fw-bold">

                                        {{ $abonne->nom }} {{ $abonne->prenom }}

                                    </div>

                                    <small class="text-muted">

                                        Abonné DJITRAK

                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>

                            {{ $abonne->email }}

                        </td>

                        <td>

                            {{ $abonne->telephone }}

                        </td>

                        <td>

                            {{ $abonne->adresse }}

                        </td>

                        <td class="text-center">

                            <a href="{{ route('abonnes.show',$abonne->id) }}"
                               class="btn btn-info btn-sm rounded-circle">

                                <i class="bi bi-eye-fill"></i>

                            </a>

                            <a href="{{ route('abonnes.edit',$abonne->id) }}"
                               class="btn btn-warning btn-sm rounded-circle">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            <form
                                action="{{ route('abonnes.destroy',$abonne->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm rounded-circle"
                                    onclick="return confirm('Supprimer cet abonné ?')">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-5">

                            <i class="bi bi-person-x display-5 text-secondary"></i>

                            <h5 class="mt-3">

                                Aucun abonné trouvé

                            </h5>

                            <p class="text-muted">

                                Commencez par ajouter un nouvel abonné.

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