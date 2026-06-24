@extends('layouts.app')

@section('content')

<h2 class="mb-4">
Tableau de bord
</h2>

<div class="row">

<div class="col-md-4">

<div class="card card-dashboard">

<div class="card-body text-center">

<h1>
{{ App\Models\Abonne::count() }}
</h1>

Abonnés

</div>

</div>

</div>

<div class="col-md-4">

<div class="card card-dashboard">

<div class="card-body text-center">

<h1>
{{ App\Models\Facture::count() }}
</h1>

Factures

</div>

</div>

</div>

<div class="col-md-4">

<div class="card card-dashboard">

<div class="card-body text-center">

<h1>
{{ App\Models\Paiement::count() }}
</h1>

Paiements

</div>

</div>

</div>

</div>

@endsection