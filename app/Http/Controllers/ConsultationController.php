<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsultationResource;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultation = Consultation::all();
        return ConsultationResource::collection($consultation);
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
        $data = new Consultation([
            'patient_id' => $request->get('patientID'),
            'diagnosis' => $request->get('diagnose'),
            'symptoms' => $request->get('symptoms'),
            'blood' => $request->get('blood'),
            'allergy' => $request->get('allergy'),
            'medication' => $request->get('medication'),
            'social_hist' => $request->get('socialHistory'),
            'family_hist' => $request->get('familyHistory'),
            'disability_hist' => $request->get('disabilityHistory')
        ]);

        $data->save();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
    }
}
