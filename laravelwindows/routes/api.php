<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GithubController;
use Laravel\Socialite\Two\GithubProvider;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('login/google/callback', [GoogleController::class, 'callback']);

Route::get('login/github/callback', [GithubController::class, 'callback']);

Route::get('login/facebook/callback', [GithubController::class, 'callback']);
