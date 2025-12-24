<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

// Ruta para obtener el token CSRF
Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/eventos', [EventoController::class, 'index']);
Route::post('/eventos', [EventoController::class, 'store']);
Route::put('/eventos/{id}', [EventoController::class, 'update']);
Route::get('/eventos/search', [EventoController::class, 'search']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/eventos/{id}/favorite', [EventoController::class, 'addFavorite']);
    Route::delete('/eventos/{id}/favorite', [EventoController::class, 'removeFavorite']);
    Route::get('/eventos/favorites', [EventoController::class, 'getFavorites']);
});
