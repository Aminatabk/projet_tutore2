@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-info text-white">

        <h4 class="mb-0">
            Nouvelle consommation
        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('consommations.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Abonné
                </label>

                <select name="abonne_id"
                        class="form-control">

                    @foreach($abonnes as $abonne)

                        <option value="{{ $abonne->id }}">
                            {{ $abonne->nom }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Ancien index
                </label>

                <input type="number"
                       name="ancienne_valeur"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nouvel index
                </label>

                <input type="number"
                       name="nouvelle_valeur"
                       class="form-control">

            </div>

            <button class="btn btn-success">
                Enregistrer
            </button>

        </form>

    </div>

</div>

@endsection