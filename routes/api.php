<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientCustomController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ICDCustomController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\PrescriptionCustomController;
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
Route::get('/patient/family/{patID}', [PatientCustomController::class, 'getNextOfKind']);
Route::get('/patient/insurance/{patID}', [PatientCustomController::class, 'getInsurance']);

Route::get('/icd10/blocks', [ICDCustomController::class, 'getICDBlocks']);
Route::get('/icd10/chapters', [ICDCustomController::class, 'getICDChapters']);
Route::get('/icd10/codes', [ICDCustomController::class, 'getICDCodes']);
Route::get('/icd10/map', [ICDCustomController::class, 'getICDMap']);
Route::get('/icd10/raw', [ICDCustomController::class, 'getICDRaw']);
Route::get('/icd10/report', [ICDCustomController::class, 'getICDReport']);

Route::get('/prescription/all', [PrescriptionCustomController::class, 'getPrescription']);
Route::get('/insurance/all', [PrescriptionCustomController::class, 'getInsurance']);
Route::get('/pivotMeds/all', [PrescriptionCustomController::class, 'getPivotMeds']);
Route::get('/patientMeds/{patID}', [PrescriptionCustomController::class, 'getPatientMeds']);

Route::apiResource('patient', PatientController::class);
Route::apiResource('family', FamilyController::class);
Route::apiResource('insurance', InsuranceController::class);
Route::apiResource('staff', StaffController::class);
Route::apiResource('appointment', AppointmentController::class);
Route::apiResource('case', CaseController::class);
Route::apiResource('role', RoleController::class);
Route::apiResource('consultation', ConsultationController::class);
Route::apiResource('medicine', MedicineController::class);
Route::apiResource('prescription', PrescriptionController::class);
Route::apiResource('payment', PaymentController::class);
