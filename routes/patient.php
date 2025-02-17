<?php

use App\Http\Controllers\Auth\PatientLoginController;
use App\Http\Controllers\website\PatientAppController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// ============  Patient Route : ( Only Guard Patient Can Access this route ) ============
Route::middleware(['auth:patient', 'verified'])->group(function () {
    Route::get('Dashboard.Patient.index', [PatientLoginController::class, 'index'])->name('dashboard.patient');

    Route::prefix('Dashboard/patient')->group(function () {
        Route::get('invoices', [PatientAppController::class, 'invoices'])->name('patient.invoices');
        Route::get('rays', [PatientAppController::class, 'rays'])->name('patient.rays');
        Route::get('labs', [PatientAppController::class, 'labs'])->name('patient.labs');
        Route::get('view_ray/{id}', [PatientAppController::class, 'view_ray'])->name('patientRays.view_ray');
        Route::get('view_lab/{id}', [PatientAppController::class, 'view_lab'])->name('patientLab.view_lab');
        Route::get('payments', [PatientAppController::class, 'payments'])->name('patient.payments');

    });
});


// chat Route : ( (Guard Patient and doctors) Can Access this route )
Route::middleware(['auth:patient,doctor'])->group(function () {
    Route::get('user/list', CreateChat::class)->name('user.list');
    Route::get('user/chat', Main::class)->name('user.chat');
});


require __DIR__ . '/auth.php';
