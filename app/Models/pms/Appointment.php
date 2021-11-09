<?php

namespace App\Models\pms;

use App\Models\Cases;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'patient_id',
        'staff_id',
        'case_id',
        'description',
        'date',
        'time',        
    ];

    public function case()
    {
        return $this->hasOne(Cases::class);
    }
}
