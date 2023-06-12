<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PortofolioController;
use App\Http\Controllers\API\ResumeController;
use App\Http\Controllers\API\AboutMeController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\CategoryController;

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

Route::middleware('jwt.api')->group(function () {
    Route::controller(AboutMeController::class)->group(function () {
        Route::get('aboutme', 'GetAllAboutMe');
        Route::get('aboutme/{id}', 'GetAboutMeById');
        Route::post('aboutme', 'CreateAboutMe');
        Route::put('aboutme/{id}', 'UpdateAboutMe');
        Route::delete('aboutme/{id}', 'DeleteAboutMe');
    });
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(SkillController::class)->group(function () {
        Route::get('skill', 'GetAllSkill');
        Route::get('skill/{id}', 'GetSkillById');
        Route::post('skill', 'CreateSkill');
        Route::put('skill/{id}', 'UpdateSkill');
        Route::delete('skill/{id}', 'DeleteSkill');
    });
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'GetAllCategory');
        Route::get('category/{id}', 'GetCategoryById');
        Route::post('category', 'CreateCategory');
        Route::put('category/{id}', 'UpdateCategory');
        Route::delete('category/{id}', 'DeleteCategory');
    });
});

Route::middleware('jwt.api')->group(function () {
    Route::controller(ResumeController::class)->group(function () {
        Route::get('resume', 'GetAllResume');
        Route::get('resume/{id}', 'GetResumeById');
        Route::post('resume', 'CreateResume');
        Route::put('resume/{id}', 'UpdateResume');
        Route::delete('resume/{id}', 'DeleteResume');
    });
});
