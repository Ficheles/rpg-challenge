<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RpgClassController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\GuildController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::apiResource('classes', RpgClassController::class);
    Route::apiResource('players', PlayerController::class);
    Route::patch('players/{id}/confirm', [PlayerController::class, 'confirm']);
    Route::post('/form-guilds', [GuildController::class, 'formGuilds']);
});