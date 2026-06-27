@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning">

        <h4 class="mb-0">
            Modifier un abonné
        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('abonnes.update',$abonne->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Nom
                </label>

                <input type="text"
                       name="nom"
                       value="{{ $abonne->nom }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Prénom
                </label>

                <input type="text"
                       name="prenom"
                       value="{{ $abonne->prenom }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ $abonne->email }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Téléphone
                </label>

                <input type="text"
                       name="telephone"
                       value="{{ $abonne->telephone }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Adresse
                </label>

                <textarea name="adresse"
                          class="form-control">{{ $abonne->adresse }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Compte client lié
                </label>

                <select name="user_id" class="form-control">

                    <option value="">
                        -- Aucun compte lié --
                    </option>

                    @foreach($usersDisponibles as $user)

                        <option value="{{ $user->id }}"
                            {{ $abonne->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>

                    @endforeach

                </select>

                <small class="text-muted">
                    Permet à ce client de voir ses propres factures, consommations et réclamations
                    quand il se connecte.
                </small>

            </div>

            <button class="btn btn-primary">

                Mettre à jour

            </button>

        </form>

    </div>

</div>

@endsection