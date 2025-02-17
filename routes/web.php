<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// go to home page
Route::get('/', function () {
    return view('index');
});


Route::prefix('home')->group(function () {
    Route::get('service', [HomeController::class, 'service'])->name('home.service');
    Route::get('section', [HomeController::class, 'section'])->name('home.section');
    Route::get('doctor', [HomeController::class, 'doctor'])->name('home.doctor');
    Route::get('appointments', [HomeController::class, 'appointments'])->name('home.appointments');
});


Route::middleware('auth:admin,doctor,labEmployees,rayEmployees,patient')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('index', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });
});
