<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Offering;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('pet', 'offering')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $pets = Pet::all();
        $offerings = Offering::all();
        return view('appointments.create', compact('pets', 'offerings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'offering_id' => 'required|exists:offerings,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Appointment::create($request->all());
        return redirect()->route('appointments.index')->with('success', 'Cita creada con éxito.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $pets = Pet::all();
        $offerings = Offering::all();
        return view('appointments.edit', compact('appointment', 'pets', 'offerings'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'offering_id' => 'required|exists:offerings,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($request->all());
        return redirect()->route('appointments.index')->with('success', 'Cita actualizada con éxito.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Cita eliminada con éxito.');
    }

    public function restore($id)
    {
        $appointment = Appointment::withTrashed()->findOrFail($id); 
        $appointment->restore(); 

        return redirect()->route('trashed.index')->with('success', 'Cita restaurada correctamente.');
    }

}
