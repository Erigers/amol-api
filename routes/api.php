<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AddressController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;

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

//protected routess
Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::resource("address",AddressController::class)->only([
        "destroy","store","show","update"
    ]);
    Route::post('/logout',[AuthController::class,'logout']);
});
Route::post("/register",[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//
//Route::get('/auth/redirect', function () {
//    return Socialite::driver('github')->redirect();
//});
//
//Route::get('/auth/callback', function () {
//    $user = Socialite::driver('github')->user();
//
//    // $user->token
//});


