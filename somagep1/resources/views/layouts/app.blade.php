<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>DJITRAK</title>

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
    background:linear-gradient(180deg,#0a3d91,#0d6efd);
    padding:25px;
    box-shadow:8px 0 20px rgba(0,0,0,.15);
}

.logo{
    color:white;
    text-align:center;
    margin-bottom:45px;
}

.logo h2{
    font-weight:700;
    letter-spacing:2px;
}

.logo small{
    font-size:13px;
}
.sidebar a{

    display:flex;
    align-items:center;
    gap:12px;

    color:white;
    text-decoration:none;

    padding:14px 18px;

    border-radius:14px;

    margin-bottom:10px;

    transition:.35s;

    font-weight:500;

}

.sidebar a:hover{

    background:white;
    color:#0d6efd;

    transform:translateX(6px);

}
.sidebar i{
    margin-right:10px;
}

.topbar{

    background:white;

    border-radius:18px;

    padding:22px 30px;

    box-shadow:0 10px 30px rgba(0,0,0,.06);

}

.card-dashboard{

    border:none;

    border-radius:22px;

    transition:.35s;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.card-dashboard:hover{

    transform:translateY(-8px);

    box-shadow:0 20px 40px rgba(13,110,253,.15);

}

.stat-icon{
    font-size:45px;
    margin-bottom:10px;
}

.content{

    padding:35px;

}

</style>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>

<div class="container-fluid">

<div class="row">

<div class="col-md-2 sidebar">

<div class="logo text-center">

    <div style="font-size:55px;">
        💧
    </div>

    <h2 class="fw-bold mb-0">
        DJITRAK
    </h2>

    <small class="text-light opacity-75">
        La gestion intelligente de l'eau
    </small>

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

<button class="btn btn-light w-100 rounded-4 fw-bold py-2">
    <i class="bi bi-box-arrow-right"></i>
    Déconnexion
</button>
    <i class="bi bi-box-arrow-right"></i>
    Déconnexion
</button>

</form>

</div>

<div class="col-md-10 content">

<div class="topbar">

<div class="d-flex justify-content-between">

<div>

<h3 class="fw-bold mb-1">
    Tableau de bord DJITRAK
</h3>

<p class="text-secondary mb-0">
    Système de gestion intelligente de la distribution d'eau
</p>

</div>

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