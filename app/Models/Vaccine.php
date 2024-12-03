<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vaccines';

    protected $fillable = [
        'pet_id',
        'name',
        'description',
        'number_of_doses',
        'days_between_doses',
        'start_date',
        'next_dose_date',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
