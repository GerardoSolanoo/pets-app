@extends('layouts.app')

@section('title', 'Pets')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Mascotas</h2>
        <a href="{{ route('pets.create') }}" class="btn btn-primary">Agregar mascota</a>
    </div>

    <div class="row mt-4">
        @forelse($pets as $pet)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Imagen de la mascota -->
                    <img src="{{ asset('storage/' . $pet->image) }}" alt="Imagen de {{ $pet->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    
                    <div class="card-body">
                        <!-- Información de la mascota -->
                        <h5 class="card-title">{{ $pet->name }}</h5>
                        <p class="card-text"><strong>Especie:</strong> {{ $pet->species }}</p>
                        <p class="card-text"><strong>Edad:</strong> {{ $pet->age }} años</p>
                        <p class="card-text"><strong>Raza:</strong> {{ $pet->race }}</p>
                        <p class="card-text"><strong>Dueño:</strong> {{ $pet->owner_name }}</p>
                        <p class="card-text"><strong>Teléfono:</strong> {{ $pet->phone_number }}</p>
                    </div>

                    <div class="card-footer text-center">
                        <!-- Botones de acción -->
                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                        <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta mascota?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No se encontraron mascotas.
                </div>
            </div>
        @endforelse
    </div>
@endsection
