<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->group(function () {
    //Facebook
    Route::prefix('facebook')->group(function () {
        Route::get('/', [SocialController::class, 'facebookRedirect']);
        Route::get('callback', [SocialController::class, 'loginWithFacebook']);
    });
    //Twitter
    Route::prefix('twitter')->group(function () {
        Route::get('/', [SocialController::class, 'twitterRedirect']);
        Route::get('callback', [SocialController::class, 'loginWithTwitter']);
    });
});
