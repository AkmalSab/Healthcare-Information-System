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
        'appointment_id',
        'consultation_id',
        'patient_id',
        'medicine',
        'quantity',
        'created_at',
        'updated_at'
    ];

    protected $medicine, $quantity;

    /**
     * Mutator method to set bar's value
     */
    public function setMedicineAttribute($value)
    {
        $this->medicine = $value;
    }

    /**
     * Accessor method to retrieve bar's value
     */
    public function getMedicineAttribute()
    {
        return $this->medicine;
    }

    /**
     * Mutator method to set bar's value
     */
    public function setQuantityAttribute($value)
    {
        $this->quantity = $value;
    }

    /**
     * Accessor method to retrieve bar's value
     */
    public function getQuantityAttribute()
    {
        return $this->quantity;
    }

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

    public function medicine_prescriptions()
    {
        return $this->belongsToMany(medicine_prescription::class, 'prescription_id');
    }
}
