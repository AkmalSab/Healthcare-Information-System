<?php

namespace App\Models\pms;

use App\Models\Consultation;
use App\Models\pms\Insurance;
use App\Models\pms\Prescription;
use App\Models\Queue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nric',
        'phone',
        'marital_status',
        'occupation',
        'birthdate',
        'gender',
        'religion',
        'country',
        'race',
        'address_1',
        'address_2',
        'state',
        'postcode',
        'city',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }

    public function queue()
    {
        return $this->hasOne(Queue::class);
    }
}
