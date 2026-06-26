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

<div class="card shadow-sm mb-3">

    <div class="card-body">

        <form action="{{ route('abonnes.index') }}" method="GET" class="d-flex gap-2">

            <input type="text"
                   name="q"
                   value="{{ $recherche ?? '' }}"
                   class="form-control"
                   placeholder="Rechercher par nom, prénom, téléphone ou email...">

            <button class="btn btn-primary">
                <i class="bi bi-search"></i>
                Rechercher
            </button>

            @if(!empty($recherche))
                <a href="{{ route('abonnes.index') }}" class="btn btn-secondary">
                    Réinitialiser
                </a>
            @endif

        </form>

    </div>

</div>

<div class="card shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
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
                    <td>{{ $abonne->prenom }}</td>
                    <td>{{ $abonne->email }}</td>
                    <td>{{ $abonne->telephone }}</td>
                    <td>{{ $abonne->adresse }}</td>

                    <td>

                        <a href="{{ route('abonnes.show',$abonne->id) }}"
                           class="btn btn-info btn-sm">

                            <i class="bi bi-eye"></i>

                        </a>

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

                    <td colspan="7" class="text-center">

                        @if(!empty($recherche))
                            Aucun abonné ne correspond à "{{ $recherche }}"
                        @else
                            Aucun abonné enregistré
                        @endif

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection