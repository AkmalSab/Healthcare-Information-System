<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'instruction',
        'appointment_id',
        'created_at',
        'updated_at'
    ];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }
}
