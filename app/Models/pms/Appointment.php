<?php

namespace App\Models\pms;

use App\Models\Cases;
use App\Models\Prescription;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    // https://laravel.com/docs/8.x/eloquent-relationships#one-to-many

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
        return $this->belongsTo(Cases::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }
}
