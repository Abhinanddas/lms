<?php

use App\Http\Controllers\api\LanguageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\SignUpController;
use App\Http\Controllers\api\UserController;

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

Route::prefix('/user')->group(function ()
{
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/signup', [SignUpController::class, 'signup']);
});


Route::middleware(['auth:api'])->group(function ()
{
    Route::get('/test', [UserController::class, 'index']);
    Route::post('/user/logout', [LoginController::class, 'logout']);
    Route::apiResource('languages',LanguageController::class);
});
