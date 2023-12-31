<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Data\AboutMeController;
use App\Http\Controllers\Data\PortofolioController;

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

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
Route::get('/login', [LoginController::class, 'index'])->name('login.page');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');


Route::middleware('jwt.web')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/table', [DashboardController::class, 'table'])->name('table');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/getme', [LoginController::class, 'getMe'])->name('getme');
    Route::get('/aboutme', [AboutMeController::class, 'GetAllAboutMe'])->name('aboutme');
});

Route::middleware('jwt.web')->group(function () {
    Route::post('/portofolio', [PortofolioController::class, 'CreatePortofolio'])->name('portofolio');
});