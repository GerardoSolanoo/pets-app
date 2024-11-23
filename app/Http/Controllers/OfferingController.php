<?php

namespace App\Http\Controllers;

use App\Models\Offering;
use Illuminate\Http\Request;

class OfferingController extends Controller
{
    public function index()
    {
        $offerings = Offering::all();
        return view('offerings.index', compact('offerings'));
    }

    public function create()
    {
        return view('offerings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:0',
        ]);

        Offering::create($request->all());
        return redirect()->route('offerings.index')->with('success', 'Servicio creado con éxito.');
    }

    public function show(Offering $offering)
    {
        return view('offerings.show', compact('offering'));
    }

    public function edit(Offering $offering)
    {
        return view('offerings.edit', compact('offering'));
    }

    public function update(Request $request, Offering $offering)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:0',
        ]);

        $offering->update($request->all());
        return redirect()->route('offerings.index')->with('success', 'Servicio actualizado con éxito.');
    }

    public function destroy(Offering $offering)
    {
        $offering->delete();
        return redirect()->route('offerings.index')->with('success', 'Servicio eliminado con éxito.');
    }

    public function restore($id)
    {
        $offering = Offering::withTrashed()->findOrFail($id); 
        $offering->restore(); 

        return redirect()->route('trashed.index')->with('success', 'Servicio restaurado correctamente.');
    }

}
