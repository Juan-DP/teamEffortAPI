<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CharityController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ChallengeController;

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


Route::group(['middleware' => ['web']], function () {
    Route::prefix('auth')->group(function () {
        Route::get('facebook', [SocialController::class, 'facebookRedirect']);
        Route::get('facebook/callback', [SocialController::class, 'loginWithFacebook']);
    });

    Route::apiResource('challenge', ChallengeController::class);
    Route::apiResource('charity', CharityController::class);
    Route::apiResource('donation', DonationController::class);
    Route::apiResource('team', TeamController::class);
});
