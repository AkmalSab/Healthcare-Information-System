<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;

class QueueCustomController extends Controller
{
    public function displayLatest()
    {
        $lastRecord = Queue::join('patients', 'patients.id', '=', 'queues.patient_id')
        ->latest('queue_no')->first();

        return response()->json($lastRecord);
    }
}
