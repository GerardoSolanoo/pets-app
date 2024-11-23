@extends('layouts.app')

@section('title', 'Editar Mascota')

@section('content')
<div class="container">
    <h2>Editar Mascota</h2>
    <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $pet->name }}" required>
        </div>
        <div class="col-md-6">
            <label for="species" class="form-label">Especie</label>
            <input type="text" class="form-control" id="species" name="species" value="{{ $pet->species }}" required>
        </div>
        <div class="col-md-6">
            <label for="age" class="form-label">Edad</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $pet->age }}" required>
        </div>
        <div class="col-md-6">
            <label for="race" class="form-label">Raza</label>
            <input type="text" class="form-control" id="race" name="race" value="{{ $pet->race }}" required>
        </div>
        <div class="col-md-6">
            <label for="owner_name" class="form-label">Nombre del Dueño</label>
            <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ $pet->owner_name }}" required>
        </div>
        <div class="col-md-6">
            <label for="phone_number" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $pet->phone_number }}" maxlength="10" required>
        </div>
        <div class="col-md-12">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <p class="text-muted">Deja este campo vacío si no deseas cambiar la imagen.</p>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection