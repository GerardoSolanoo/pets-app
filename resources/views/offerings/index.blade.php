@extends('layouts.app')

@section('title', 'Servicios')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Servicios</h2>
        <a href="{{ route('offerings.create') }}" class="btn btn-primary">Agregar servicio</a>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Duración(Minutos)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($offerings as $offering)
                    <tr>
                        <td>{{ $offering->id }}</td>
                        <td>{{ $offering->name }}</td>
                        <td>{{ $offering->description }}</td>
                        <td>{{ $offering->price }}</td>
                        <td>{{ $offering->duration }}</td>
                        <td>
                            <a href="{{ route('offerings.edit', $offering->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('offerings.destroy', $offering->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this offering?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Servicios no encontrados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
