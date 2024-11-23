<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'appointments';

    protected $fillable = [
        'pet_id',
        'offering_id',
        'date',
        'time',
        'status',
        'notes',
    ];
    
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function offering()
    {
        return $this->belongsTo(Offering::class);
    }
}
