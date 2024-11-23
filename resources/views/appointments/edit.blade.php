@extends('layouts.app')

@section('title', 'Editar Cita')

@section('content')
<div class="container">
    <h2>Editar Cita</h2>
    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="pet_id" class="form-label">Mascota</label>
            <select class="form-select" id="pet_id" name="pet_id" required>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $appointment->pet_id == $pet->id ? 'selected' : '' }}>
                        {{ $pet->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="offering_id" class="form-label">Servicio</label>
            <select class="form-select" id="offering_id" name="offering_id" required>
                @foreach ($offerings as $offering)
                    <option value="{{ $offering->id }}" {{ $appointment->offering_id == $offering->id ? 'selected' : '' }}>
                        {{ $offering->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $appointment->date }}" required>
        </div>
        <div class="col-md-6">
            <label for="time" class="form-label">Hora</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ $appointment->time }}" required>
        </div>
        <div class="col-md-12">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmada</option>
                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3">{{ $appointment->notes }}</textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection
