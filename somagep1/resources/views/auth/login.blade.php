<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Connexion - DJITRAK</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    margin:0;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(135deg,#0a3d91,#0d6efd,#38b6ff);
    font-family:'Segoe UI',sans-serif;
    overflow:hidden;
    position:relative;
}

.drop{
    position:absolute;
    top:-10%;
    width:18px;
    opacity:.55;
    animation:fall linear infinite;
    filter:drop-shadow(0 4px 4px rgba(0,0,0,.15));
}

@keyframes fall{
    to{
        transform:translateY(110vh);
    }
}

.login-wrapper{
    position:relative;
    z-index:2;
    width:100%;
    max-width:340px;
    padding:15px;
}

.login-card{
    border:none;
    border-radius:18px;
    box-shadow:0 20px 40px rgba(0,0,0,.25);
    overflow:hidden;
}

.login-header{
    background:linear-gradient(135deg,#0a3d91,#0d6efd);
    color:white;
    text-align:center;
    padding:22px 15px 16px;
}

.login-header svg{
    width:42px;
    height:54px;
}

.login-header h3{
    font-weight:700;
    letter-spacing:1px;
    margin:6px 0 0;
    font-size:1.3rem;
}

.login-header small{
    opacity:.8;
    font-size:.75rem;
}

.login-body{
    padding:24px 22px;
    background:white;
}

.form-control{
    border-radius:10px;
    padding:9px 12px;
    font-size:.9rem;
}

.form-control:focus{
    border-color:#0d6efd;
    box-shadow:0 0 0 .2rem rgba(13,110,253,.15);
}

.btn-login{
    border-radius:10px;
    padding:9px;
    font-weight:600;
    font-size:.95rem;
    background:linear-gradient(135deg,#0a3d91,#0d6efd);
    border:none;
}

.btn-login:hover{
    opacity:.92;
}

.input-icon{
    position:relative;
}

.input-icon i{
    position:absolute;
    left:13px;
    top:50%;
    transform:translateY(-50%);
    color:#888;
    font-size:.9rem;
}

.input-icon input{
    padding-left:36px;
}

.login-body p, .login-body a{
    font-size:.85rem;
}

</style>

</head>
<body>

<!-- Gouttes d'eau réalistes (SVG) en fond -->
@php
    $dropSvg = '<svg viewBox="0 0 32 42" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="g1" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#bfe9ff"/>
                <stop offset="55%" stop-color="#3aa0ff"/>
                <stop offset="100%" stop-color="#0a5fd6"/>
            </linearGradient>
        </defs>
        <path d="M16 2 C16 2 28 18 28 27 C28 35 22.6 40 16 40 C9.4 40 4 35 4 27 C4 18 16 2 16 2 Z" fill="url(#g1)"/>
        <ellipse cx="11" cy="22" rx="2.4" ry="4" fill="#ffffff" opacity=".55"/>
    </svg>';
@endphp

@foreach([
    ['left'=>'4%','dur'=>'7s','delay'=>'0s'],
    ['left'=>'14%','dur'=>'5s','delay'=>'1s'],
    ['left'=>'27%','dur'=>'9s','delay'=>'.5s'],
    ['left'=>'40%','dur'=>'6s','delay'=>'2s'],
    ['left'=>'55%','dur'=>'8s','delay'=>'.2s'],
    ['left'=>'68%','dur'=>'5.5s','delay'=>'1.5s'],
    ['left'=>'80%','dur'=>'7.5s','delay'=>'.8s'],
    ['left'=>'91%','dur'=>'6.5s','delay'=>'.3s'],
] as $d)
    <div class="drop" style="left:{{ $d['left'] }}; animation-duration:{{ $d['dur'] }}; animation-delay:{{ $d['delay'] }};">
        {!! $dropSvg !!}
    </div>
@endforeach

<div class="login-wrapper">

    <div class="card login-card">

        <div class="login-header">

            {!! $dropSvg !!}

            <h3>DJITRAK</h3>

            <small>La gestion intelligente de l'eau</small>

        </div>

        <div class="login-body">

            @if($errors->any())

                <div class="alert alert-danger py-2">

                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach

                </div>

            @endif

            <form method="POST" action="/login">

                @csrf

                <div class="mb-3 input-icon">

                    <i class="bi bi-envelope-fill"></i>

                    <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Adresse email"
                    required>

                </div>

                <div class="mb-3 input-icon">

                    <i class="bi bi-lock-fill"></i>

                    <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Mot de passe"
                    required>

                </div>

                <button class="btn btn-login text-white w-100">
                    Se connecter
                </button>

            </form>

            <hr class="my-3">

            <p class="text-center mb-0">
                Pas encore de compte ?
                <a href="/register" class="text-decoration-none fw-bold">
                    Créer un compte
                </a>
            </p>

        </div>

    </div>

</div>

</body>
</html>