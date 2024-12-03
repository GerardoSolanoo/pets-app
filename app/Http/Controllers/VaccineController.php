<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Models\Pet;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = Vaccine::with('pet')->get();
        return view('vaccines.index', compact('vaccines'));
    }

    public function create()
    {
        $pets = Pet::all();
        return view('vaccines.create', compact('pets'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'pet_id' => 'required|exists:pets,id',
                'name' => 'required|string',
                'description' => 'nullable|string',
                'number_of_doses' => 'required|integer',
                'days_between_doses' => 'required|integer',
                'start_date' => 'required|date',
            ]);

            $data = $request->all();
            $data['next_dose_date'] = $this->calculateNextDoseDate($data['start_date'], $data['days_between_doses']);

            Vaccine::create($data);
            return redirect()->route('vaccines.index')->with('success', 'Vacuna creada con éxito.');
        } catch (Exception $e) {
            return redirect()->route('vaccines.index')->with('error', 'Error al crear la vacuna.');
        }
    }

    public function show(Vaccine $vaccine)
    {
        return view('vaccines.show', compact('vaccine'));
    }

    public function edit(Vaccine $vaccine)
    {
        $pets = Pet::all();
        return view('vaccines.edit', compact('vaccine', 'pets'));
    }

    
    public function update(Request $request, Vaccine $vaccine)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'number_of_doses' => 'required|integer',
            'days_between_doses' => 'required|integer',
            'start_date' => 'required|date',
        ]);

        $data = $request->all();
        $data['next_dose_date'] = $this->calculateNextDoseDate($data['start_date'], $data['days_between_doses']);

        $vaccine->update($data);
        return redirect()->route('vaccines.index')->with('success', 'Vacuna actualizada con éxito.');
    }

    public function destroy(Vaccine $vaccine)
    {
        $vaccine->delete();
        return redirect()->route('vaccines.index')->with('success', 'Vacuna eliminada con éxito.');
    }

    public function restore($id)
    {
        $vaccine = Vaccine::withTrashed()->findOrFail($id);
        $vaccine->restore();

        return redirect()->route('vaccines.index')->with('success', 'Vacuna restaurada con éxito.');
    }

    protected function calculateNextDoseDate($startDate, $daysBetweenDoses)
    {
        return \Carbon\Carbon::parse($startDate)->addDays((int)$daysBetweenDoses)->format('Y-m-d');
    }
}




