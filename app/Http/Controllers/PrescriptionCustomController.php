<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrescriptionResource;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionCustomController extends Controller
{
    public function getPrescription()
    {
        $data = Prescription::all();
        // return response()->json($data);
        return PrescriptionResource::collection($data);
    }
}
