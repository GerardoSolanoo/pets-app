@extends('layouts.app')

@section('title', 'Editar Servicio')

@section('content')
<div class="container">
    <h2>Editar Servicio</h2>
    <form action="{{ route('offerings.update', $offering->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre del Servicio</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $offering->name }}" required>
        </div>
        <div class="col-md-6">
            <label for="price" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $offering->price }}" required>
        </div>
        <div class="col-md-12">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $offering->description }}</textarea>
        </div>
        <div class="col-md-6">
            <label for="duration" class="form-label">Duración (minutos)</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ $offering->duration }}" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection