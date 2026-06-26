@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Gestion des consommations
        </h2>

        <p class="text-muted mb-0">
            Consultez les relevés de consommation des abonnés.
        </p>

    </div>

    <a href="{{ route('consommations.create') }}"
       class="btn btn-primary rounded-3 px-4">

        <i class="bi bi-plus-circle-fill"></i>

        Nouvelle consommation

    </a>

</div>


<div class="card border-0 shadow rounded-4">

    <div class="card-header bg-white border-0">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">

                <i class="bi bi-droplet-fill text-primary"></i>

                Liste des consommations

            </h5>

            <span class="badge bg-primary fs-6">

                {{ $consommations->count() }} Consommation(s)

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

                    <th>Ancien index</th>

                    <th>Nouvel index</th>

                    <th>Consommation</th>

                    <th class="text-center">

                        Actions

                    </th>

                </tr>

                </thead>

                <tbody>

                @forelse($consommations as $consommation)

                <tr>

                    <td>

                        <span class="fw-bold text-primary">

                            #{{ $consommation->id }}

                        </span>

                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle bg-info text-white d-flex justify-content-center align-items-center me-3"
                                 style="width:45px;height:45px;">

                                <i class="bi bi-person-fill"></i>

                            </div>

                            <div>

                                <strong>

                                    {{ $consommation->abonne->nom ?? 'N/A' }}

                                </strong>

                                <br>

                                <small class="text-muted">

                                    Abonné DJITRAK

                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        {{ $consommation->ancienne_valeur }}

                    </td>

                    <td>

                        {{ $consommation->nouvelle_valeur }}

                    </td>

                    <td>

                        <span class="badge bg-primary fs-6 px-3 py-2">

                            💧 {{ $consommation->consommation }} m³

                        </span>

                    </td>

                    <td class="text-center">

                        <a href="{{ route('consommations.edit',$consommation->id) }}"
                           class="btn btn-warning btn-sm rounded-circle">

                            <i class="bi bi-pencil-fill"></i>

                        </a>

                        <form action="{{ route('consommations.destroy',$consommation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm rounded-circle"
                                    onclick="return confirm('Supprimer cette consommation ?')">

                                <i class="bi bi-trash-fill"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-5">

                        <i class="bi bi-droplet-half display-4 text-secondary"></i>

                        <h5 class="mt-3">

                            Aucune consommation enregistrée

                        </h5>

                        <p class="text-muted">

                            Cliquez sur "Nouvelle consommation" pour commencer.

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