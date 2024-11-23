<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offering extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'offerings';

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

