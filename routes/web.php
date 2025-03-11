<?php

use App\Http\Controllers\FabricadoController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\PrefabricadoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('muebles',MuebleController::class);
Route::resource('fabricados',FabricadoController::class);
Route::resource('prefabricados',PrefabricadoController::class);
