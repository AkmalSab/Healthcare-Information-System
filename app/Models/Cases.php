<?php

namespace App\Models;

use App\Models\pms\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function appointments()
    {
        return $this->hasOne(Appointment::class);
    }
}
