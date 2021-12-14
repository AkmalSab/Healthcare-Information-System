<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentCustomController extends Controller
{
    public function getPayment(Request $request)
    {
        // $data = DB::table('payments')
        // ->select('medicines.name AS meds_name', 'medicines.cost AS meds_cost', 'medicine_prescription.quantity AS meds_qty',
        // 'medicines.price_per_unit AS meds_price', 'patients.name AS pat_name', 'patients.phone', 'patients.nric', 'patients.address_1', 'patients.address_2',
        // 'patients.state', 'patients.postcode', 'patients.city', 'patients.country', 'payments.created_at AS payment_created_on',
        // 'payments.type AS payment_type', 'payments.status AS payment_status', 'prescriptions.description AS presc_desc',
        // 'prescriptions.instruction', 'payments.id AS paymentID')
        // ->join('medicine_prescription', 'medicine_prescription.prescription_id', '=', 'payments.prescription_id')
        // ->join('prescriptions', 'prescriptions.id', '=', 'medicine_prescription.prescription_id')
        // ->join('medicines', 'medicines.id', '=', 'medicine_prescription.medicine_id')
        // ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
        // ->get();

        $data = DB::table('prescriptions')
        ->select('patients.name', 'prescriptions.description', 'prescriptions.instruction', 'prescriptions.id')
        ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
        ->get();

        $data = DB::table('payments')
        ->select('patients.name', 'prescriptions.description', 'prescriptions.instruction', 'payments.id')
        ->join('prescriptions', 'prescriptions.id', '=', 'payments.prescription_id')
        ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
        ->get();

        return response()->json($data);
    }

    public function getPaymentDetails(Request $request)
    {
        $data = DB::table('payments')
        ->select('medicine_prescription.medicine_id', 'medicine_prescription.prescription_id', 'medicine_prescription.frequency',
        'medicine_prescription.quantity', 'patients.name', 'patients.address_1', 'patients.address_2', 'patients.state', 'patients.postcode',
        'patients.phone', 'medicines.name AS medsName', 'medicines.price_per_unit AS medsPrice', 'prescriptions.created_at AS date',
        'payments.type AS paymentType')
        ->join('medicine_prescription', 'medicine_prescription.prescription_id', '=', 'payments.prescription_id')
        ->join('medicines', 'medicines.id', '=', 'medicine_prescription.medicine_id')
        ->join('prescriptions', 'prescriptions.id', '=', 'medicine_prescription.prescription_id')
        ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
        ->where('payments.prescription_id', '=', $request->route('prescID'))
        ->get();

        return response()->json($data);
    }
}
