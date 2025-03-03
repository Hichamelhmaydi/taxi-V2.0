<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', function () { return view('auth.register'); })->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::middleware('role:admin')->get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::middleware('role:chauffeur')->get('/chauffeur/trips', [ChauffeurController::class, 'trips']);
    Route::middleware('role:passager')->get('/passager/reservations', [PassagerController::class, 'reservations']);
});
Route::get('/', function () { return view('welcome'); });
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});
Route::post('/update-status', [UserController::class, 'updateStatus'])->name('update.status');

