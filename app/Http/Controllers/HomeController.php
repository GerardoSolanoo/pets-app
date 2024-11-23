<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {        
        $appointments = Appointment::where('date', '>=', Carbon::today())
                                    ->where('date', '<=', Carbon::today()->addDays(7))
                                    ->orderBy('date')
                                    ->get();
        
        $upcomingAppointments = $appointments->where('date', '>=', Carbon::today());

        return view('home.index', compact('appointments', 'upcomingAppointments'));
    }
}
