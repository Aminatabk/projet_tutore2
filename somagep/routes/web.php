<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReclamationController;

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
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard.index');
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
| Paiements
|--------------------------------------------------------------------------
*/

Route::post('/paiement', [PaiementController::class, 'payer'])
    ->middleware('auth');
