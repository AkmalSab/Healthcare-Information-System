<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prescription;
use App\Models\Medicine;


class medicine_prescription extends Model
{
    use HasFactory;

    protected $table = 'medicine_prescription';

    protected $fillable = [
        'medicine_id',
        'prescription_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'id');
    }
}
