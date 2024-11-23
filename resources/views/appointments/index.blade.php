@extends('layouts.app')

@section('title', 'Appointments')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Citas</h2>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Agregar cita</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Mascota</th>
                    <th>Servicio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estatus</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->pet->name }}</td>
                        <td>{{ $appointment->offering->name }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->status }}</td>
                        <td>{{ $appointment->notes }}</td>
                        <td>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Citas no encontradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
