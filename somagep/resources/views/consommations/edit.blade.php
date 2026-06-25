@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-warning text-white">

        <h4 class="mb-0">
            Modifier la consommation
        </h4>

    </div>

    <div class="card-body">

        <form action="{{ route('consommations.update', $consommation->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Abonné
                </label>

                <select name="abonne_id"
                        class="form-control">

                    @foreach($abonnes as $abonne)

                        <option value="{{ $abonne->id }}" {{ $abonne->id == $consommation->abonne_id ? 'selected' : '' }}>
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
                       class="form-control"
                       value="{{ $consommation->ancienne_valeur }}">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Nouvel index
                </label>

                <input type="number"
                       name="nouvelle_valeur"
                       class="form-control"
                       value="{{ $consommation->nouvelle_valeur }}">

            </div>

            <button class="btn btn-success">
                Mettre à jour
            </button>

        </form>

    </div>

</div>

@endsection
