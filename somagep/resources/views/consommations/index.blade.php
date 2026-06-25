@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        Gestion des consommations
    </h2>

    <a href="{{ route('consommations.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Nouvelle consommation

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-info">

                <tr>
                    <th>ID</th>
                    <th>Abonné</th>
                    <th>Ancien Index</th>
                    <th>Nouvel Index</th>
                    <th>Consommation</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            @forelse($consommations as $consommation)

                <tr>

                    <td>{{ $consommation->id }}</td>

                    <td>
                        {{ $consommation->abonne->nom ?? 'N/A' }}
                    </td>

                    <td>{{ $consommation->ancienne_valeur }}</td>

                    <td>{{ $consommation->nouvelle_valeur }}</td>

                    <td>
                        <span class="badge bg-primary">
                            {{ $consommation->consommation }} m³
                        </span>
                    </td>

                    <td>

                        <a href="{{ route('consommations.edit',$consommation->id) }}"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="{{ route('consommations.destroy',$consommation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cette consommation ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">
                        Aucune consommation enregistrée
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection