<?php

namespace App\Models;

use App\Models\pms\Appointment;
use App\Models\pms\Patient;
use App\Models\Medicine;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'instruction',
        'start_consume',
        'frequency',
        'quantity',
        'appointment_id',
        'patient_id',
        'created_at',
        'updated_at'
    ];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_prescription', 'medicine_id', 'prescription_id')->withPivot('quantity');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
