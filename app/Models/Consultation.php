<?php

namespace App\Models;

use App\Models\pms\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'diagnosis',
        'symptoms',
        'blood',
        'allergy',
        'medication',
        'social_hist',
        'family_hist',
        'disability_hist',
        'created_at',
        'updated_at'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
