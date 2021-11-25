<?php

namespace App\Models;

use App\Models\Prescription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'manufacturer',
        'cost',
        'type',
        'dose',
        'stock',
        'created_at',
        'updated_at',
        'picture'
    ];
    
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class, 'medicine_prescription', 'medicine_id', 'prescription_id')->withPivot('quantity');
    }
}
