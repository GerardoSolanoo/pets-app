<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'race' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {            
            $imagePath = $request->file('image')->store('pets_images', 'public');
        }

        
        Pet::create([
            'name' => $request->name,
            'species' => $request->species,
            'age' => $request->age,
            'race' => $request->race,
            'owner_name' => $request->owner_name,
            'phone_number' => $request->phone_number,
            'image' => $imagePath, 
        ]);

        return redirect()->route('pets.index')->with('success', 'Mascota creada con éxito.');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'race' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        
        if ($request->hasFile('image')) {
            
            if ($pet->image) {
                Storage::delete('public/' . $pet->image); 
            }

            $imagePath = $request->file('image')->store('pets_images', 'public');
            $pet->image = $imagePath; 
        }

        
        $pet->update($request->except('image'));

        return redirect()->route('pets.index')->with('success', 'Mascota actualizada con éxito.');
    }

    public function destroy(Pet $pet)
    {
        
        if ($pet->image) {
            Storage::delete('public/' . $pet->image); 
        }

        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Mascota eliminada con éxito.');
    }

    public function restore($id)
    {
        $pet = Pet::withTrashed()->findOrFail($id); 
        $pet->restore(); 

        return redirect()->route('trashed.index')->with('success', 'Mascota restaurada correctamente.');
    }
}
