<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineCustomController extends Controller
{
    public function tempMedicinePic(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            dd('ada gambar');
        }
    }
}
