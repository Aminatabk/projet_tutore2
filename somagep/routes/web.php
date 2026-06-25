<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Page d'accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Dashboards
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/agent/dashboard', function () {
    return view('agent.dashboard');
})->middleware('auth');

Route::get('/client/dashboard', function () {
    return view('client.dashboard');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| Espace Client
|--------------------------------------------------------------------------
*/

Route::get('/mes-factures', function () {

    $factures = App\Models\Facture::all();

    return view(
        'client.factures',
        compact('factures')
    );

})->middleware('auth');

Route::get('/mes-consommations', function () {

    $consommations = App\Models\Consommation::all();

    return view(
        'client.consommations',
        compact('consommations')
    );

})->middleware('auth');

Route::get('/mes-reclamations', function () {

    $reclamations = App\Models\Reclamation::all();

    return view(
        'client.reclamations',
        compact('reclamations')
    );

})->middleware('auth');

Route::get('/mon-profil', function () {

    return view('client.profil');

})->middleware('auth');

Route::get('/paiement-facture', function () {

    return view('client.paiement');

})->middleware('auth');

/*
|--------------------------------------------------------------------------
| Gestion des abonnés
|--------------------------------------------------------------------------
*/

Route::resource('abonnes', AbonneController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Gestion des consommations
|--------------------------------------------------------------------------
*/

Route::resource('consommations', ConsommationController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Gestion des factures
|--------------------------------------------------------------------------
*/

Route::resource('factures', FactureController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Gestion des réclamations
|--------------------------------------------------------------------------
*/

Route::resource('reclamations', ReclamationController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Gestion des utilisateurs
|--------------------------------------------------------------------------
*/

Route::resource('users', UserController::class)
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Paiements
|--------------------------------------------------------------------------
*/

Route::post('/paiement', [PaiementController::class, 'payer'])
    ->middleware('auth');
