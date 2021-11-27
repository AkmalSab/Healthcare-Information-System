<?php

namespace App\Http\Controllers;

// use DB;
use Illuminate\Support\Facades\DB;
use App\Models\pms\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientData = Patient::all();
        return response()->json($patientData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->all('patient') as $key => $data) {
            $pat = json_decode($data);
        }
        foreach ($request->all('medicine') as $key => $data) {
            $meds = json_decode($data);
        }

        $desc = $request->get('desc');
        $ins = $request->get('instruction');
        $start = $request->get('start');
        $freq = $request->get('frequency');
        $qty = $request->get('quantity');

        $presData = new Prescription ([
            'patient_id' => $pat->id,
            'description' => $desc,
            'instruction' => $ins,
            'start_consume' => $start,
            'frequency' => $freq
        ]);
        $presData->save();

        $bridgeTable = DB::table('medicine_prescription')->insert([
            'medicine_id'=> $meds[0]->id,
            'prescription_id' => $presData->id,
            'quantity' => $qty,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        dd($pat, $meds, $desc, $ins, $presData->id, $pat->id, $start, $freq, $qty);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
