<!DOCTYPE html>
<html>
<head>

<title>Connexion</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#0d6efd;
}

.login-card{
    margin-top:120px;
}

</style>

</head>
<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card login-card">

<div class="card-header text-center">

<h3>SOMAGEP</h3>

</div>

<div class="card-body">

<form method="POST" action="/login">

<?php echo csrf_field(); ?>

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

<button class="btn btn-primary w-100">

Connexion

</button>

</form>

<hr>

<a href="/register">
Créer un compte
</a>

</div>

</div>

</div>

</div>

</div>

</body>
</html><?php /**PATH C:\Users\USER\Desktop\projet_tutore2\somagep\resources\views/auth/login.blade.php ENDPATH**/ ?>