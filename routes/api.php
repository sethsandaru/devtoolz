<?php

use App\Http\Controllers\EncryptorController;
use App\Http\Controllers\RandomIdsController;
use App\Http\Controllers\RandomPersonController;
use Illuminate\Support\Facades\Route;

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

Route::post('random-ids', [RandomIdsController::class, 'random']);
Route::post('encrypt', [EncryptorController::class, 'encrypt']);
Route::post('random-person', [RandomPersonController::class, 'random']);
