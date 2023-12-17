<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class)->except(['show']);
    Route::put('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::resource('/registrations', RegistrationController::class)->except(['edit', 'update']);
    Route::get('/registrations/status', [RegistrationController::class, 'status'])->name('registrations.status');
    Route::patch('/registrations/{registration}/approve', [RegistrationController::class, 'approve'])->name('registrations.approve');
    Route::patch('/registrations/{registration}/reject', [RegistrationController::class, 'reject'])->name('registrations.reject');
    Route::get('/registration/{registration}/print', [RegistrationController::class, 'print'])->name('registrations.print');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
