<?php
use App\Http\Controllers\pokemonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pokemon',[pokemonController::class, 'get']);

Route::post('/pokemon',[pokemonController::class, 'add']);
