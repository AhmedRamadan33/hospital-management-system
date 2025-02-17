<?php

use App\Http\Controllers\Auth\DoctorLoginController;
use App\Http\Controllers\website\DoctorApp\DiagnosticsController;
use App\Http\Controllers\website\DoctorApp\DoctorStatementController;
use App\Http\Controllers\website\DoctorApp\LabController;
use App\Http\Controllers\website\DoctorApp\RayController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// ============  Doctor Route : ( Only Guard Doctor Can Access this route ) ============
Route::middleware(['auth:doctor', 'verified'])->group(function () {
    Route::get('Dashboard.Doctor.index', [DoctorLoginController::class, 'index'])->name('dashboard.doctor');

    Route::prefix('statement')->group(function () {
        Route::get('NotCompleted', [DoctorStatementController::class, 'NotCompleted'])->name('statement.NotCompleted');
        Route::get('Completed', [DoctorStatementController::class, 'Completed'])->name('statement.Completed');
        Route::post('status.update/{id}', [DoctorStatementController::class, 'statusUpdate'])->name('status.update');
    });
    Route::prefix('diagnostics')->group(function () {
        Route::get('index', [DiagnosticsController::class, 'index'])->name('diagnostics.index');
        Route::post('store', [DiagnosticsController::class, 'store'])->name('diagnostics.store');
        Route::get('patient_Info/{id}', [DiagnosticsController::class, 'show'])->name('diagnostics.patient_Info');
    });
    Route::prefix('ray')->group(function () {
        Route::post('store', [RayController::class, 'store'])->name('ray.store');
        Route::post('update/{id}', [RayController::class, 'update'])->name('ray.update');
        Route::post('destroy/{id}', [RayController::class, 'destroy'])->name('ray.destroy');
        Route::get('show/{id}', [RayController::class, 'show'])->name('ray.show');
    });
    Route::prefix('lab')->group(function () {
        Route::post('store', [LabController::class, 'store'])->name('lab.store');
        Route::post('update/{id}', [LabController::class, 'update'])->name('lab.update');
        Route::post('destroy/{id}', [LabController::class, 'destroy'])->name('lab.destroy');
        Route::get('show/{id}', [LabController::class, 'show'])->name('lab.show');

    });
});



require __DIR__ . '/auth.php';
