<?php

namespace App\Models\pms;

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
        'city'
    ];
}
