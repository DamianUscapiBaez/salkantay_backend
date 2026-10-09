<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// api de clientes
Route::apiResource('clientes', \App\Http\Controllers\ClienteController::class);
// api de tours
Route::apiResource('tours', \App\Http\Controllers\TourController::class);
// api de reversaciones
Route::apiResource('reservaciones', \App\Http\Controllers\ReservacionController::class);