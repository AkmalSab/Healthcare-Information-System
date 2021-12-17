<?php

namespace App\Http\Controllers;

use App\Http\Resources\QueueResource;
use App\Models\Queue;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Queue::all();
        return QueueResource::collection($all);
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
        foreach ($request->all('queueData') as $key => $data) {
            $data = json_decode($data);
        }

        $lastRecord = Queue::select('id')->latest('queue_no')->first();
        if ($lastRecord) {
            foreach ($lastRecord as $key => $dataa) {
                $last = json_decode($dataa);
            }

            $store = new Queue([
                'patient_id' => $data->id,
                'queue_no' => $last += 1
            ]);
        }
        else {
            $lastRecord = 0;
            $store = new Queue([
                'patient_id' => $data->id,
                'queue_no' => $lastRecord += 1
            ]);
        }
        $store->save();

        return response()->json('Queue Created Successfully ✔');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function show(Queue $queue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function edit(Queue $queue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Queue $queue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Queue  $queue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Queue $queue)
    {
        //
    }
}
