<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbonneController;
use App\Http\Controllers\ConsommationController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD ROUTER
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| DASHBOARDS BY ROLE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', function () {
        return view('agent.dashboard');
    })->name('agent.dashboard');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', function () {
        return view('client.dashboard');
    })->name('client.dashboard');
});

/*
|--------------------------------------------------------------------------
| APP RESOURCES (Protected by Auth)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    
    // Abonnés (accessibles aux admins et agents)
    Route::middleware('role:admin,agent')->group(function () {
        Route::resource('abonnes', AbonneController::class);
    });

    // Consommations (accessibles aux admins et agents)
    Route::middleware('role:admin,agent')->group(function () {
        Route::resource('consommations', ConsommationController::class);
    });

    // Factures (accessibles aux admins et agents pour la gestion globale)
    Route::middleware('role:admin,agent')->group(function () {
        Route::resource('factures', FactureController::class);
    });

    // Paiements
    Route::get('/paiements', [PaiementController::class, 'index'])->name('paiements.index');
    Route::get('/paiements/create', [PaiementController::class, 'create'])->name('paiements.create');
    Route::post('/paiement', [PaiementController::class, 'payer'])->name('paiements.payer');

    // Réclamations
    Route::resource('reclamations', ReclamationController::class);
    Route::post('/reclamations/{id}/traiter', [ReclamationController::class, 'traiter'])->name('reclamations.traiter');
    Route::post('/reclamations/{id}/encours', [ReclamationController::class, 'encours'])->name('reclamations.encours');
    Route::post('/reclamations/{id}/rejeter', [ReclamationController::class, 'rejeter'])->name('reclamations.rejeter');

    // Gestion Utilisateurs (Admin uniquement)
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});

/*
|--------------------------------------------------------------------------
| TEST
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return "TEST OK";
});