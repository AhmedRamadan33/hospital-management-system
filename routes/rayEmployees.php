<?php

use App\Http\Controllers\Auth\RayEmployeesLoginController;
use App\Http\Controllers\website\RayEmployeeApp\RayController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ============  rayEmployees Route : ( Only Guard rayEmployees Can Access this route ) ============
Route::middleware(['auth:rayEmployees', 'verified'])->group(function () {
    Route::get('Dashboard.rayEmployees.index', [RayEmployeesLoginController::class, 'index'])->name('dashboard.rayEmployees');

    Route::prefix('rayEmployees')->group(function () {
        Route::get('index', [RayController::class, 'index'])->name('rayEmp.index');
        Route::get('edit/{id}', [RayController::class, 'edit'])->name('rayEmp.edit');
        Route::post('update/{id}', [RayController::class, 'update'])->name('rayEmp.update');
        Route::post('destroy/{id}', [RayController::class, 'destroy'])->name('rayEmp.destroy');
        Route::get('show/{id}', [RayController::class, 'show'])->name('rayEmp.show');
        Route::get('rayCompleted', [RayController::class, 'rayCompleted'])->name('rayEmp.rayCompleted');
    });

});


require __DIR__.'/auth.php';

