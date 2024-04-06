<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cron\CronController;

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

Route::get('/animals/hungry', [CronController::class, 'makeAnimalsHungry']);
Route::get('/animals/sleepy', [CronController::class, 'makeAnimalsSleepy']);
Route::get('/animals/bored', [CronController::class, 'makeAnimalsBored']);