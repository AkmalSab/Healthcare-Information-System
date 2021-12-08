<?php

namespace App\Http\Controllers;

// use DB;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PrescriptionResource;
use App\Http\Resources\InsuranceResource;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\medicine_prescription;
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
            ->select('medicine_prescription.prescription_id', 'prescriptions.description')
            ->join('medicines', 'medicines.id', '=', 'medicine_prescription.medicine_id')
            ->join('prescriptions', 'prescriptions.id', '=', 'medicine_prescription.prescription_id')
            ->where('prescriptions.patient_id', '=', $request->route('patID'))
            ->groupBy('medicine_prescription.prescription_id', 'prescriptions.description')
            ->get();

            return response()->json($data);
    }

    public function getPatientName()
    {
        $data = DB::table('prescriptions')
            ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
            ->select('patients.name', 'patients.id')
            ->groupBy('name', 'id')
            ->get();

        return response()->json($data);
    }

    public function fetchPrescription()
    {
        $data = Prescription::latest()->first();
        return response()->json($data);
    }

    public function storePrescription(Request $request)
    {
        foreach ($request->all('patient') as $key => $data) {
            $pat = json_decode($data);
        }
        $desc = $request->get('desc');
        $ins = $request->get('instruction');

        $prescData = new Prescription([
            'patient_id' => $pat->id,
            'description' => $desc,
            'instruction' => $ins
        ]);
        $prescData->save();

        return response()->json('Prescription Created Successfully ✔');
    }
}
