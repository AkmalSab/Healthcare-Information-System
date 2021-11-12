<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Http\Resources\StaffResource;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();

        return StaffResource::collection($staff);
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
        $data = new Staff([
            'name' => $request->get('name'),
            'role_id' => $request->get('role'),
            'nric' => $request->get('nric'),
            'phone' => $request->get('phone'),
            'marital_status' => $request->get('marital_status'),
            'occupation' => $request->get('occupation'),
            'birthdate' => $request->get('birthdate'),
            'gender' => $request->get('gender'),
            'religion' => $request->get('religion'),
            'country' => $request->get('country'),
            'race' => $request->get('race'),
            'address_1' => $request->get('address_1'),
            'address_2' => $request->get('address_2'),
            'state' => $request->get('state'),
            'postcode' => $request->get('postcode'),
            'city' => $request->get('city'),
        ]);
        $data->save();
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
