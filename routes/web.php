<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
