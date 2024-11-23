<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pets';

    protected $fillable = [
        'name',
        'species',
        'age',
        'race',
        'owner_name',
        'phone_number',
        'image'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}

