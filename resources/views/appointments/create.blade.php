@extends('layouts.app')

@section('title', 'Agregar Cita')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Cita</h1>
    <form action="{{ route('appointments.store') }}" method="POST">
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
            <label for="offering_id" class="form-label">Servicio</label>
            <select class="form-select" id="offering_id" name="offering_id" required>
                <option value="">Selecciona un servicio</option>
                @foreach($offerings as $offering)
                    <option value="{{ $offering->id }}">{{ $offering->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Hora</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
