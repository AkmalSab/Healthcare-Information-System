<?php

namespace App\Models;

use App\Models\pms\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'queue_no'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
