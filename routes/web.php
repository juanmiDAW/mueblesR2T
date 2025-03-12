<?php

use App\Http\Controllers\FabricadoController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PrefabricadoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard');

Route::view('dashboard', 'dashboard')
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('muebles',MuebleController::class);
Route::resource('fabricados',FabricadoController::class);
Route::resource('prefabricados',PrefabricadoController::class);
Route::resource('pedidos',PedidoController::class);
