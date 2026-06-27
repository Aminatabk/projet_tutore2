@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des Utilisateurs</h2>

    <a href="{{ route('users.create') }}"
       class="btn btn-primary">

        <i class="bi bi-person-plus"></i>
        Ajouter utilisateur

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>

                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($users as $user)

                <tr>

                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>

                        @if($user->role == 'admin')

                            <span class="badge bg-danger">
                                Administrateur
                            </span>

                        @elseif($user->role == 'agent')

                            <span class="badge bg-primary">
                                Agent
                            </span>

                        @else

                            <span class="badge bg-success">
                                Client
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ route('users.edit',$user->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Aucun utilisateur trouvé

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection