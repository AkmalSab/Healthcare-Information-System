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
        foreach ($request->all('start') as $key => $data) {
            $start = json_decode($data);
        }
        foreach ($request->all('frequency') as $key => $data) {
            $freq = json_decode($data);
        }
        foreach ($request->all('quantity') as $key => $data) {
            $qty = json_decode($data);
        }
        $desc = $request->get('desc');
        $ins = $request->get('instruction');
        // dd($pat, $meds->id);

        $data = collect([
            $pat->id, $start, $freq, $qty, $meds->id, $desc, $ins
        ])->transpose()->map(function ($snData) {
            // dd($snData);
            return new Prescription([
                'patient_id' => $snData[0],
                'description' => $snData[5],
                'instruction' => $snData[6],
                'start_consume' => $snData[1],
                'frequency' => $snData[2],
                'quantity' => $snData[3],
                'medicine' => $snData[4]
            ]);
        })->each(function ($storeExpense) {
            // dd($storeExpense->medicine);
            $storeExpense->save();

            DB::table('medicine_prescription')->insert([
                'medicine_id'=> $storeExpense->medicine,
                'prescription_id' => $storeExpense->id,
                'quantity' => $storeExpense->quantity,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            // dd($storeExpense->id);
        });

        // $presData = new Prescription ([
        //     'patient_id' => $pat->id,
        //     'description' => $desc,
        //     'instruction' => $ins,
        //     'start_consume' => $start,
        //     'frequency' => $freq
        // ]);
        // $presData->save();

        // $bridgeTable = DB::table('medicine_prescription')->insert([
        //     'medicine_id'=> $meds[0]->id,
        //     'prescription_id' => $presData->id,
        //     'quantity' => $qty,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        return response()->json('Prescription Created Successfully ✔');
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
