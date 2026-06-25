@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Mes Factures
</h2>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Montant</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>

        @foreach($factures as $facture)

        <tr>
            <td>{{ $facture->id }}</td>
            <td>{{ $facture->montant }}</td>
            <td>{{ $facture->created_at }}</td>
        </tr>

        @endforeach

    </tbody>

</table>

@endsection