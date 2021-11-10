<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staffs';

    protected $fillable = [
        'role_id',
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

    public function role()
    {
        return $this->hasOne(Role::class);
    }
}
