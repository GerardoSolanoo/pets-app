@extends('layouts.app')

@section('title', 'Agregar Vacuna')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Vacuna</h1>
    <form action="{{ route('vaccines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pet_id" class="form-label">Mascota</label>
            <select class="form-select" id="pet_id" name="pet_id" required>
                <option value="">Selecciona una mascota</option>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la Vacuna</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="number_of_doses" class="form-label">Número de dosis</label>
            <input type="number" class="form-control" id="number_of_doses" name="number_of_doses" min="1" required>
        </div>
        <div class="mb-3">
            <label for="days_between_doses" class="form-label ">Días entre dosis</label>
            <input type="number" class="form-control" id="days_between_doses" name="days_between_doses" min="1" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection