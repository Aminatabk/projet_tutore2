<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SOMAGEP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.sidebar{
    min-height:100vh;
    background:#0d6efd;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:12px;
}

.sidebar a:hover{
    background:#084298;
}

.card-dashboard{
    border:none;
    box-shadow:0 0 15px rgba(0,0,0,.1);
}

</style>

</head>
<body>

<div class="container-fluid">

<div class="row">

<div class="col-md-2 sidebar">

<h3 class="text-center text-white mt-3">
SOMAGEP
</h3>

<hr class="text-white">

<a href="/dashboard">Dashboard</a>
<a href="/abonnes">Abonnés</a>
<a href="/consommations">Consommations</a>
<a href="/factures">Factures</a>
<a href="/reclamations">Réclamations</a>

<form action="/logout" method="POST">
@csrf

<button class="btn btn-danger w-100 mt-3">
Déconnexion
</button>

</form>

</div>

<div class="col-md-10 p-4">

@yield('content')

</div>

</div>

</div>

</body>
</html>