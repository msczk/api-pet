<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\DiscordUserController;
use App\Http\Controllers\Api\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('animals', AnimalController::class);

Route::prefix('discord-users')->group(function(){
    Route::get('/animals/{id_discord}', [DiscordUserController::class, 'indexAnimals']);
});

Route::apiResource('discord-users', DiscordUserController::class);

Route::prefix('game')->group(function(){
    Route::prefix('catch')->group(function(){
        Route::post('/random', [GameController::class, 'catchRandomAnimal']);
    });

    Route::put('/feed', [GameController::class, 'feedAnimal']);

    Route::put('/play', [GameController::class, 'playAnimal']);

    Route::put('/sleep', [GameController::class, 'sleepAnimal']);
});