<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\redirectIfAuth;
use App\Models\User;

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('profil', ProfilController::class);
    Route::resource('user', UserController::class);
    Route::post('/logout', [LoginController::class, 'destroy']);
});
Route::middleware([redirectIfAuth::class])->group(function() {
    Route::post('/auth', [LoginController::class, 'auth']);
    Route::get('/login', [LoginController::class, 'index']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register/store', [RegisterController::class, 'store']);
});