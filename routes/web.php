<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login.page');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});