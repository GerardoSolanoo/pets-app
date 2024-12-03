@extends('layouts.app')

@section('title', 'Editar Vacuna')

@section('content')
<div class="container">
    <h2>Editar Vacuna</h2>
    <form action="{{ route('vaccines.update', $vaccine->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="pet_id" class="form-label">Mascota</label>
            <select class="form-select" id="pet_id" name="pet_id" required>
                @foreach ($pets as $pet)
                    <option value="{{ $pet->id }}" {{ $vaccine->pet_id == $pet->id ? 'selected' : '' }}>
                        {{ $pet->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre de la Vacuna</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $vaccine->name }}" required>
        </div>
        <div class="col-md-12">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $vaccine->description }}</textarea>
        </div>
        <div class="col-md-6">
            <label for="doses" class="form-label">Número de Dosis</label>
            <input type="number" class="form-control" id="doses" name="doses" value="{{ $vaccine->doses }}" required>
        </div>
        <div class="col-md-6">
            <label for="days_between_doses" class="form-label">Días entre Dosis</label>
            <input type="number" class="form-control" id="days_between_doses" name="days_between_doses" value="{{ $vaccine->days_between_doses }}" required>
        </div>
        <div class="col-md-6">
            <label for="start_date" class="form-label">Fecha de inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $vaccine->start_date }}" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection