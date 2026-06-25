@extends('layouts.app')

@section('content')

<h2 class="mb-4">
    Paiement de facture
</h2>

<div class="card">

    <div class="card-body">

        <form action="/paiement" method="POST">

            @csrf

            <div class="mb-3">

                <label>
                    ID Facture
                </label>

                <input
                    type="number"
                    name="facture_id"
                    class="form-control"
                    required>

            </div>

            <button class="btn btn-success">

                Payer maintenant

            </button>

        </form>

    </div>

</div>

@endsection