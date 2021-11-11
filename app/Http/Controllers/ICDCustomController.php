<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ICDCustomController extends Controller
{
    public function getICDBlocks()
    {
        $data = DB::table('icd10_blocks')->get();
        return response()->json($data);
    }

    public function getICDChapters()
    {
        $data = DB::table('icd10_chapters')->get();
        return response()->json($data);
    }

    public function getICDCodes()
    {
        $data = DB::table('icd10_codes')->get();
        return response()->json($data);
    }

    public function getICDMap()
    {
        $data = DB::table('icd10_map')->get();
        return response()->json($data);
    }

    public function getICDRaw()
    {
        $data = DB::table('icd10_raw')->get();
        return response()->json($data);
    }

    public function getICDReport()
    {
        $data = DB::table('icd10_report')->get();
        return response()->json($data);
    }
}
