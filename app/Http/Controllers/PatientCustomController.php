<?php

namespace App\Http\Controllers;

use App\Models\pms\Patient;
use Illuminate\Http\Request;

class PatientCustomController extends Controller
{
    public function getPatientName() {
        $patients = Patient::select('id', 'name')->get();

        return response()->json($patients);
    }

    public function getPatientData(Request $request) {
        $patient = Patient::select('id', 'name', 'nric', 'phone')->where('id', '=', $request->route('patientID'))->get();

        return response()->json($patient);
    }
}
