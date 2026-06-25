@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Gestion des Factures</h2>

    <a href="{{ route('factures.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>
        Nouvelle facture

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <table class="table table-hover">

            <thead class="table-primary">

                <tr>

                    <th>ID</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

            @foreach($factures as $facture)

                <tr>

                    <td>{{ $facture->id }}</td>

                    <td>
                        {{ $facture->montant }} FCFA
                    </td>

                    <td>
                        {{ $facture->created_at }}
                    </td>

                    <td>

                        <span class="badge bg-success">
                            Payée
                        </span>

                    </td>

                    <td>

                        <a href="{{ route('factures.edit',$facture->id) }}"
                           class="btn btn-warning btn-sm">

                            <i class="bi bi-pencil"></i>

                        </a>

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection