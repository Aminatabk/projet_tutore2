@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des Réclamations</h2>

    <a href="{{ route('reclamations.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Nouvelle réclamation

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>Sujet</th>
                    <th>Description</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            @forelse($reclamations as $reclamation)

                <tr>

                    <td>{{ $reclamation->id }}</td>

                    <td>
                        <strong>{{ $reclamation->objet }}</strong>
                    </td>

                    <td>{{ $reclamation->description }}</td>

                    <td>

                        <span class="badge bg-warning">
                            {{ $reclamation->statut }}
                        </span>

                    </td>

                    <td>

                        <a href="{{ route('reclamations.show',$reclamation->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="bi bi-eye"></i>

                        </a>

                        <a href="{{ route('reclamations.edit',$reclamation->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                        <form action="{{ route('reclamations.destroy',$reclamation->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cette réclamation ?')">

                                <i class="bi bi-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        Aucune réclamation trouvée
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection