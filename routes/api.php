<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('challenge', ChallengeController::class);
Route::apiResource('charity', CharityController::class);
Route::apiResource('donation', DonationController::class);
Route::apiResource('team', TeamController::class);