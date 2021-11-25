<?php

namespace App\Http\Controllers;

// use DB;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PrescriptionResource;
use App\Http\Resources\InsuranceResource;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\pms\Insurance;
use Illuminate\Http\Request;

class PrescriptionCustomController extends Controller
{
    public function getPrescription()
    {
        $data = Prescription::all();
        // return response()->json($data);
        return PrescriptionResource::collection($data);
    }

    public function getInsurance()
    {
        $data = Insurance::all();
        // return response()->json($data);
        return InsuranceResource::collection($data);
    }

    public function getPivotMeds()
    {
        // $data = Medicine::with('prescriptions')->get();
        $data = Prescription::with('medicines')->get();
        return response()->json($data);
    }

    public function getPatientMeds(Request $request)
    {
        $data = DB::table('medicine_prescription')
            ->join('medicines', 'medicines.id', '=', 'medicine_prescription.medicine_id')
            ->join('prescriptions', 'prescriptions.id', '=', 'medicine_prescription.prescription_id')
            ->join('appointments', 'appointments.id', '=', 'prescriptions.appointment_id')
            ->where('appointments.patient_id', '=', $request->route('patID'))
            ->get();
        
            return response()->json($data);
    }

    public function getPatientMedsAkmal(Request $request)
    {
        $data = DB::table('medicine_prescription')
            ->join('medicines', 'medicines.id', '=', 'medicine_prescription.medicine_id')
            ->join('prescriptions', 'prescriptions.id', '=', 'medicine_prescription.prescription_id')
            ->join('appointments', 'appointments.id', '=', 'prescriptions.appointment_id')
            ->where('appointments.patient_id', '=', $request->route('patID'))
            ->get();
        
        // return response()->json($data);
        
        $Prescription = Prescription::find(1);

        foreach ($Prescription->medicines as $role) {
            echo $role;
        }
    }
}
