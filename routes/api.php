<?php

use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MedicalAppointmentController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\SpecialtyController;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/patient')->group(function() {
    Route::post('',  [PatientController::class, 'create'])->name('patient.api.create');
});

Route::prefix('/specialty')->group(function() {
    Route::post('',  [SpecialtyController::class, 'create'])->name('specialty.api.create');
});

Route::prefix('/doctor')->group(function() {
    Route::post('',  [DoctorController::class, 'create'])->name('doctor.api.create');
});

Route::prefix('/medical-appointment')->group(function() {
    Route::post('',  [MedicalAppointmentController::class, 'create'])->name('medical-appointment.api.create');
});
