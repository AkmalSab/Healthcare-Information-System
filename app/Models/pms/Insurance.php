<?php

namespace App\Models\pms;

use App\Models\pms\Patient;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'name',        
        'medical_card_no',       
        'type',
        'expiry_date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
