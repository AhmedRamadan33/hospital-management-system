<?php

use App\Http\Controllers\Auth\LabEmployeesLoginController;
use App\Http\Controllers\website\LabEmployeeApp\LabController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ============  labEmployees Route : ( Only Guard labEmployees Can Access this route ) ============
Route::middleware(['auth:labEmployees', 'verified'])->group(function () {
    Route::get('Dashboard.labEmployees.index', [LabEmployeesLoginController::class, 'index'])->name('dashboard.labEmployees');

    Route::prefix('labEmployees')->group(function () {
        Route::get('index', [LabController::class, 'index'])->name('labEmp.index');
        Route::get('edit/{id}', [LabController::class, 'edit'])->name('labEmp.edit');
        Route::post('update/{id}', [LabController::class, 'update'])->name('labEmp.update');
        Route::post('destroy/{id}', [LabController::class, 'destroy'])->name('labEmp.destroy');
        Route::get('show/{id}', [LabController::class, 'show'])->name('labEmp.show');
        Route::get('rayCompleted', [LabController::class, 'rayCompleted'])->name('labEmp.rayCompleted');
    });
});


require __DIR__ . '/auth.php';
