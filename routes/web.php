<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacebookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/google', [GoogleController::class, 'login']);

Route::get('login/github',[GithubController::class, 'login']);

Route::get('login/facebook',[FacebookController::class, 'login']);

Route::middleware(['auth'])->group(function(){
    Route::get('logout',[GoogleController::class, 'logout']);
    Route::get('user',[UserController::class,'index']);
});

