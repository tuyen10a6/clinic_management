<?php

use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Doctor\AuthController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\PatientController;
use Illuminate\Support\Facades\Route;

// Customer
Route::get('/', [HomeController::class, 'index'])->name('home');


// Doctor
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('post-login');
Route::middleware(['auth-doctor'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('doctor')->group(function () {
        Route::get('dashboard', [DoctorController::class, 'index'])->name('doctor-dashboard');
        Route::get('profile', [DoctorController::class, 'update'])->name('doctor-update-view');
        Route::get('schedule', [DoctorController::class, 'scheduleList'])->name('doctor-schedule-view');
        Route::get('schedule-update/{id}', [DoctorController::class, 'editScheduleDoctor'])->name('doctor-schedule-update-view');
        Route::post('schedule-post', [DoctorController::class, 'doctorScheduleStore'])->name('doctor-schedule-store');
        Route::post('schedule-update/{id}', [DoctorController::class, 'updateScheduleDoctor'])->name('doctor-schedule-update-post');
        Route::delete('schedule/delete/{id}', [DoctorController::class, 'destroy'])->name('doctor-schedule-delete');
        Route::post('update', [DoctorController::class, 'updateProfile'])->name('doctor-update');
    });
    Route::prefix('patient')->group(function () {
        Route::get('index', [PatientController::class, 'index'])->name('patient.index');
        Route::get('update/{id}', [PatientController::class, 'edit'])->name('patient.edit');
        Route::get('detail/{id}', [PatientController::class, 'showDetail'])->name('patient.detail');
        Route::get('create', [PatientController::class, 'create'])->name('patient.create');
        Route::post('store', [PatientController::class, 'store'])->name('patient.store');
        Route::post('update/{id}', [PatientController::class, 'update'])->name('patient.update.post');
        Route::post('destroy/{id}', [PatientController::class, 'destroy'])->name('patient.destroy.post');
    });
});
