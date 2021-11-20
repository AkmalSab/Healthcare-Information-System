<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrescriptionResource;
use App\Http\Resources\InsuranceResource;
use App\Models\Prescription;
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
}
