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
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| TEST
|--------------------------------------------------------------------------
*/

Route::get('/test', function () {
    return "TEST OK";
});

/*
|--------------------------------------------------------------------------
| DASHBOARDS
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/agent/dashboard', function () {
    return view('agent.dashboard');
})->middleware('auth');

Route::get('/client/dashboard', function () {
    return view('client.dashboard');
})->middleware('auth');