@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Mes consommations</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ancienne valeur</th>
                    <th>Nouvelle valeur</th>
                    <th>Consommation</th>
                </tr>
            </thead>

            <tbody>

            @foreach($consommations as $consommation)

                <tr>
                    <td>{{ $consommation->id }}</td>
                    <td>{{ $consommation->ancienne_valeur }}</td>
                    <td>{{ $consommation->nouvelle_valeur }}</td>
                    <td>{{ $consommation->consommation }}</td>
                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection