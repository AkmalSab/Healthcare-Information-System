<?php

namespace App\Models;

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
}
