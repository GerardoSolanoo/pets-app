@extends('layouts.app')

@section('title', 'Eliminados')

@section('content')
<div class="container">
    <h2 class="mb-4">Elementos Eliminados</h2>

    <h3>Mascotas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dueño</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashedPets as $pet)
                <tr>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->owner_name }}</td>
                    <td>
                        <form action="{{ route('pets.restore', $pet->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Restaurar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay mascotas eliminadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Servicios</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashedOfferings as $offering)
                <tr>
                    <td>{{ $offering->name }}</td>
                    <td>${{ $offering->price }}</td>
                    <td>
                        <form action="{{ route('offerings.restore', $offering->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Restaurar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay servicios eliminados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h3>Citas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mascota</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashedAppointments as $appointment)
                <tr>
                    <td>{{ $appointment->pet->name }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>
                        <form action="{{ route('appointments.restore', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Restaurar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No hay citas eliminadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection