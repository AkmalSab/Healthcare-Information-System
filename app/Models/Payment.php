<?php

namespace App\Models;

use App\Models\pms\Insurance;
use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'type',
        'insurance_id',
        'prescription_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
