<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Medicine::all();
        return response()->json($data);
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
        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $file_name = $request->file('image')->store('medicine_picture', 's3');
            Storage::disk('s3')->setVisibility($file_name, 'public');

            $data = new Medicine ([
                'name' => $request->get('medicineName'),
                'description' => $request->get('medicineDesc'),
                'manufacturer' => $request->get('medicineManufac'),
                'cost' => $request->get('medicineCost'),
                'type' => $request->get('medicineType'),
                'dose' => $request->get('medicineDose'),
                'stock' => $request->get('medicineStock'),
                'picture' => $request->file('image')->hashName()
            ]);
            $data->save();
            return response()->json($data);

            //dd($request->file('image')->hashName());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delMeds = Medicine::findOrFail($id);

        // Destroy data in db and aws s3
        Medicine::destroy($id);
        Storage::disk('s3')->delete('medicine_picture/'.$delMeds->picture);

        return response()->json('Medicine Deleted Successfully ✔');
    }
}
