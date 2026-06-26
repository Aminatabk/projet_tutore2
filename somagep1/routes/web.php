<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| TABLEAUX DE BORD
|--------------------------------------------------------------------------
*/

// Redirection générique vers le tableau de bord adapté au rôle de l'utilisateur
Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    return match ($role) {
        'admin' => redirect('/admin/dashboard'),
        'agent' => redirect('/agent/dashboard'),
        default => redirect('/client/dashboard'),
    };
})->middleware('auth')->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin']);

Route::get('/agent/dashboard', function () {
    return view('agent.dashboard');
})->middleware(['auth', 'role:admin,agent']);

Route::get('/client/dashboard', function () {
    return view('client.dashboard');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| ESPACE CLIENT
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/mes-factures', [ClientController::class, 'factures'])->name('client.factures');
    Route::get('/mes-consommations', [ClientController::class, 'consommations'])->name('client.consommations');
    Route::get('/mes-reclamations', [ClientController::class, 'reclamations'])->name('client.reclamations');
    Route::get('/profil', [ClientController::class, 'profil'])->name('client.profil');
});

/*
|--------------------------------------------------------------------------
| GESTION (ADMIN / AGENT)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,agent'])->group(function () {
    Route::resource('abonnes', AbonneController::class);
    Route::resource('consommations', ConsommationController::class);
    Route::resource('factures', FactureController::class);

    Route::resource('reclamations', ReclamationController::class);
    Route::patch('/reclamations/{id}/traiter', [ReclamationController::class, 'traiter'])->name('reclamations.traiter');
    Route::patch('/reclamations/{id}/encours', [ReclamationController::class, 'encours'])->name('reclamations.encours');
    Route::patch('/reclamations/{id}/rejeter', [ReclamationController::class, 'rejeter'])->name('reclamations.rejeter');

    Route::get('/paiements', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('/paiement', [PaiementController::class, 'create'])->name('paiements.create');
    Route::post('/paiement', [PaiementController::class, 'payer'])->name('paiements.store');
});

/*
|--------------------------------------------------------------------------
| GESTION DES UTILISATEURS (ADMIN UNIQUEMENT)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});
