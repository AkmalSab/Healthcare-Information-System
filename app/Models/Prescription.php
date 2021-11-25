<?php

namespace App\Models;

use App\Models\pms\Appointment;
use App\Models\Medicine;
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

    public function medicine_prescriptions()
    {
        return $this->belongsToMany(medicine_prescription::class, 'prescription_id');
    }
}
