<?php

namespace App\Http\Controllers;

use App\Http\Resources\InsuranceResource;
use App\Models\pms\Family;
use App\Models\pms\Insurance;
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

    public function getNextOfKind(Request $request)
    {
        $next = Family::all()->where('patient_id', '=', $request->route('patID'));
        return response()->json($next);
    }

    public function getInsurance(Request $request)
    {
        $insurance = Insurance::all()->where('patient_id', '=', $request->route('patID'));
        return InsuranceResource::collection($insurance);
    }
}
