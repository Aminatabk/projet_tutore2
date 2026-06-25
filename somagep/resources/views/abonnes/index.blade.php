@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        Gestion des abonnés
    </h2>

    <a href="{{ route('abonnes.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Ajouter un abonné

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

            @forelse($abonnes as $abonne)

                <tr>

                    <td>{{ $abonne->id }}</td>
                    <td>{{ $abonne->nom }}</td>
                    <td>{{ $abonne->email }}</td>
                    <td>{{ $abonne->telephone }}</td>
                    <td>{{ $abonne->adresse }}</td>

                    <td>

                        <a href="{{ route('abonnes.edit',$abonne->id) }}"
                           class="btn btn-warning btn-sm">

                            Modifier

                        </a>

                        <form action="{{ route('abonnes.destroy',$abonne->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer cet abonné ?')">

                                Supprimer

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Aucun abonné enregistré

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection