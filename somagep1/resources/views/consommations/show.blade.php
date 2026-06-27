@extends('layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-info text-white">
        <h4 class="mb-0">Détails de la consommation</h4>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Abonné</th>
                <td>{{ $consommation->abonne->nom ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Ancien index</th>
                <td>{{ $consommation->ancienne_valeur }}</td>
            </tr>
            <tr>
                <th>Nouvel index</th>
                <td>{{ $consommation->nouvelle_valeur }}</td>
            </tr>
            <tr>
                <th>Consommation</th>
                <td>{{ $consommation->consommation }} m³</td>
            </tr>
        </table>

        <a href="{{ route('consommations.edit', $consommation->id) }}" class="btn btn-warning">
            Modifier
        </a>

        <a href="{{ route('consommations.index') }}" class="btn btn-secondary">
            Retour
        </a>

    </div>

</div>

@endsection
