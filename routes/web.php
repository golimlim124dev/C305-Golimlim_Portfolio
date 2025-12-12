<?php

use Illuminate\Support\Facades\Route;

// AUTH CONTROLLER (single controller for login/register/logout)
use App\Http\Controllers\Auth\AuthController;

// PUBLIC CONTROLLERS
use App\Http\Controllers\ProjectController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Middleware\RequireAdmin;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('projects.index');
});

// Public Projects Listing
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');


/*
|--------------------------------------------------------------------------
| Authentication Routes (AuthController)
|--------------------------------------------------------------------------
*/

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', RequireAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Projects CRUD
        Route::resource('projects', AdminProjectController::class)->except(['show']);

        // Optional delete route
        Route::delete('projects/{project}/delete', [AdminProjectController::class, 'destroy'])
            ->name('projects.delete');
    });