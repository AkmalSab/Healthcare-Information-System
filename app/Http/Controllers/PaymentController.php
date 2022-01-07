<?php

namespace App\Http\Controllers;

// use DB;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Payment::all();
        // return response()->json($data);
        return PaymentResource::collection($data);
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

        // dd($request);

        foreach ($request->all('insurance') as $key => $data) {
            $ins = json_decode($data);
        }
        // foreach ($request->all('prescription') as $key => $data) {
        //     $pres = json_decode($data);
        // }

        $status = $request->get('status');
        $payment = $request->get('paymentType');
        $description = $request->get('desc');
        $medsQty = $request->get('medsQty');
        // $findMeds = Prescription::findOrFail($pres->id);
        $prescData = $request->get('prescription');

        $presData = new Payment([
            'desc' => $description,
            'type' => $payment,
            // 'insurance_id' => $ins->id,
            'prescription_id' => $prescData,
            'status' => $status
        ]);

        $presData->save();
        return response()->json($presData);

        // dd($ins->id, $pres->id, $status, $payment, $description);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $payment = Payment::find($request->id);

        $payment->status = 'Approved';

        $payment->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::destroy($id);
        return response()->json('Billing Deleted Successfully ✔');
    }
}
