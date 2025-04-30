<?php

use App\Http\Controllers\Doctor\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Doctor\DoctorController;
// Customer
Route::get('/', [HomeController::class, 'index'])->name('home');


// Doctor
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('post-login');
Route::middleware(['auth-doctor'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('doctor')->group(function () {
        Route::get('dashboard', [DoctorController::class, 'index'])->name('doctor-dashboard');
        Route::get('update-profile', [DoctorController::class, 'update'])->name('doctor-update-view');
        Route::post('update', [DoctorController::class, 'updateProfile'])->name('doctor-update');
    });
});
