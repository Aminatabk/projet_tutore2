@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h4 class="mb-0">
            Nouvel abonné
        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('abonnes.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nom complet
                </label>

                <input type="text"
                       name="nom"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Téléphone
                </label>

                <input type="text"
                       name="telephone"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Adresse
                </label>

                <textarea name="adresse"
                          class="form-control"
                          rows="3"></textarea>

            </div>

            <button class="btn btn-success">

                Enregistrer

            </button>

            <a href="{{ route('abonnes.index') }}"
               class="btn btn-secondary">

                Retour

            </a>

        </form>

    </div>

</div>

@endsection