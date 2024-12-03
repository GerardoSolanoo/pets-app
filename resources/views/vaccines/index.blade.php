@extends('layouts.app')

@section('title', 'Vacunas')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Vacunas</h2>
        <a href="{{ route('vaccines.create') }}" class="btn btn-primary">Agregar vacuna</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Número de dosis</th>
                    <th>Días entre</th>
                    <th>Fecha de inicio</th>
                    <th>Siguiente dosis</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vaccines as $vaccine)
                    <tr>
                        <td>{{ $vaccine->id }}</td>
                        <td>{{ $vaccine->name }}</td>
                        <td>{{ $vaccine->description }}</td>
                        <td>{{ $vaccine->number_of_doses}}</td>
                        <td>{{ $vaccine->days_between_doses }}</td>
                        <td>{{ $vaccine->start_date }}</td>
                        <td>{{ $vaccine->next_dose_date }}</td>
                        <td>
                            <a href="{{ route('vaccines.edit', $vaccine->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('vaccines.destroy', $vaccine->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta vacuna?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Vacunas no encontradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
@endsection