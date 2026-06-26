<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>SOMAGEP</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:#eef2f7;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    min-height:100vh;
    background:linear-gradient(180deg,#0d6efd,#084298);
    padding:20px;
}

.logo{
    text-align:center;
    color:white;
    font-size:26px;
    font-weight:bold;
    margin-bottom:30px;
}

.sidebar a{
    color:white;
    text-decoration:none;
    display:block;
    padding:12px;
    border-radius:10px;
    margin-bottom:8px;
    transition:.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,.2);
}

.sidebar i{
    margin-right:10px;
}

.topbar{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 0 10px rgba(0,0,0,.08);
    margin-bottom:25px;
}

.card-dashboard{
    border:none;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);
    transition:.3s;
}

.card-dashboard:hover{
    transform:translateY(-5px);
}

.stat-icon{
    font-size:45px;
    margin-bottom:10px;
}

.content{
    padding:30px;
}

</style>

</head>
<body>

<div class="container-fluid">

<div class="row">

<div class="col-md-2 sidebar">

<div class="logo">
    💧 SOMAGEP
</div>

<a href="/dashboard">
    <i class="bi bi-house-door-fill"></i>
    Dashboard
</a>

@if(in_array(auth()->user()->role, ['admin', 'agent']))

    <a href="/abonnes">
        <i class="bi bi-people-fill"></i>
        Abonnés
    </a>

    <a href="/consommations">
        <i class="bi bi-droplet-fill"></i>
        Consommations
    </a>

    <a href="/factures">
        <i class="bi bi-receipt"></i>
        Factures
    </a>

    <a href="/reclamations">
        <i class="bi bi-chat-left-text"></i>
        Réclamations
    </a>

    <a href="/paiements">
        <i class="bi bi-cash-coin"></i>
        Paiements
    </a>

@else

    <a href="/mes-factures">
        <i class="bi bi-receipt"></i>
        Mes Factures
    </a>

    <a href="/mes-consommations">
        <i class="bi bi-droplet-fill"></i>
        Mes Consommations
    </a>

    <a href="/mes-reclamations">
        <i class="bi bi-chat-left-text"></i>
        Mes Réclamations
    </a>

    <a href="/paiement">
        <i class="bi bi-cash-coin"></i>
        Payer une facture
    </a>

    <a href="/profil">
        <i class="bi bi-person-circle"></i>
        Mon Profil
    </a>

@endif

@if(auth()->user()->role == 'admin')

    <a href="/users">
        <i class="bi bi-person-badge-fill"></i>
        Utilisateurs
    </a>

@endif

<hr class="text-white">

<form action="/logout" method="POST">
@csrf

<button class="btn btn-danger w-100">
    <i class="bi bi-box-arrow-right"></i>
    Déconnexion
</button>

</form>

</div>

<div class="col-md-10 content">

<div class="topbar">

<div class="d-flex justify-content-between">

<h4>
    Gestion des abonnés SOMAGEP
</h4>

<span>
    Bienvenue {{ Auth::user()->name ?? '' }}
</span>

</div>

</div>

@yield('content')

</div>

</div>

</div>

</body>
</html>