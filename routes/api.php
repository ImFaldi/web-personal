<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PortofolioController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('me', 'me');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(PortofolioController::class)->group(function () {
        Route::get('portofolio', 'GetAllPortofolio');
        Route::get('portofolio/{id}', 'GetPortofolioById');
        Route::post('portofolio', 'CreatePortofolio');
        Route::put('portofolio/{id}', 'UpdatePortofolio');
        Route::delete('portofolio/{id}', 'DeletePortofolio');
    });
});
