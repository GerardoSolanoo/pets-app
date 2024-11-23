@extends('layouts.app')

@section('title', 'Agregar Servicio')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Servicio</h1>
    <form action="{{ route('offerings.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Servicio</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duración (minutos)</label>
            <input type="number" class="form-control" id="duration" name="duration" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
