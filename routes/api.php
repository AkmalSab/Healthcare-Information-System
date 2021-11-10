<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientCustomController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrescriptionController;
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

Route::get('/patient/patient-info', [PatientCustomController::class, 'getPatientName']);
Route::get('/patient/patient-info/{patientID}', [PatientCustomController::class, 'getPatientData']);

Route::apiResource('patient', PatientController::class);
Route::apiResource('family', FamilyController::class);
Route::apiResource('insurance', InsuranceController::class);
Route::apiResource('staff', StaffController::class);
Route::apiResource('appointment', AppointmentController::class);
Route::apiResource('case', CaseController::class);
Route::apiResource('consultation', ConsultationController::class);
Route::apiResource('medicine', MedicineController::class);
Route::apiResource('prescription', PrescriptionController::class);
