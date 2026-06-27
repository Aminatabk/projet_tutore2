<!DOCTYPE html>
<html>
<head>

<title>Inscription</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card">

<div class="card-header">

Créer un compte

</div>

<div class="card-body">

<form action="/register" method="POST">

@csrf

<input
type="text"
name="name"
class="form-control mb-3"
placeholder="Nom">

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Email">

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Mot de passe">

<button class="btn btn-success w-100">

S'inscrire

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>