<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Offering;
use App\Models\Appointment;

class TrashedController extends Controller
{
    public function index()
    {
        return view('trashed.index', [
            'trashedPets' => Pet::onlyTrashed()->get(),
            'trashedOfferings' => Offering::onlyTrashed()->get(),
            'trashedAppointments' => Appointment::onlyTrashed()->get(),
        ]);
    }
}

