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
use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

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

Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/mes-factures', [ClientController::class, 'factures'])->name('client.factures');
    Route::get('/mes-consommations', [ClientController::class, 'consommations'])->name('client.consommations');
    Route::get('/mes-reclamations', [ClientController::class, 'reclamations'])->name('client.reclamations');
    Route::get('/profil', [ClientController::class, 'profil'])->name('client.profil');

    Route::get('/reclamations/create', [ReclamationController::class, 'create'])->name('reclamations.create');
    Route::post('/reclamations', [ReclamationController::class, 'store'])->name('reclamations.store');

    Route::get('/paiement', [PaiementController::class, 'create'])->name('paiements.create');
    Route::post('/paiement', [PaiementController::class, 'payer'])->name('paiements.store');
});

Route::middleware(['auth', 'role:admin,agent'])->group(function () {
    Route::resource('abonnes', AbonneController::class);
    Route::resource('consommations', ConsommationController::class);
    Route::resource('factures', FactureController::class);

    Route::get('/reclamations', [ReclamationController::class, 'index'])->name('reclamations.index');
    Route::get('/reclamations/{id}', [ReclamationController::class, 'show'])->name('reclamations.show');
    Route::get('/reclamations/{id}/edit', [ReclamationController::class, 'edit'])->name('reclamations.edit');
    Route::put('/reclamations/{id}', [ReclamationController::class, 'update'])->name('reclamations.update');
    Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');
    Route::patch('/reclamations/{id}/traiter', [ReclamationController::class, 'traiter'])->name('reclamations.traiter');
    Route::patch('/reclamations/{id}/encours', [ReclamationController::class, 'encours'])->name('reclamations.encours');
    Route::patch('/reclamations/{id}/rejeter', [ReclamationController::class, 'rejeter'])->name('reclamations.rejeter');

    Route::get('/paiements', [PaiementController::class, 'index'])->name('paiements.index');

    Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});