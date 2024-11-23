@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container mt-4">
    <h1>Bienvenido a PataSana</h1>

    <div class="row">
        <!-- Calendario de Citas -->
        <div class="col-md-8">
            <h3>Calendario de Citas</h3>
            @if($appointments->isEmpty())
                <div class="alert alert-warning">
                    No tienes citas programadas para los próximos días.
                </div>
            @else
                <div id="calendar"></div>
            @endif
        </div>

        <!-- Notificaciones -->
        <div class="col-md-4">
            <h3>Notificaciones</h3>
            @if($upcomingAppointments->isEmpty())
                <div class="alert alert-info">
                    No hay citas próximas para mostrar.
                </div>
            @else
                @foreach ($upcomingAppointments as $appointment)
                    <div class="alert alert-info">
                        <strong>{{ $appointment->pet->name }}</strong> tiene una cita para el <strong>{{ $appointment->date }}</strong> a las <strong>{{ $appointment->time }}</strong>.
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            events: [
                @foreach ($appointments as $appointment)
                {
                    title: '{{ $appointment->pet->name }} - {{ $appointment->offering->name }}',
                    start: '{{ $appointment->date }}T{{ $appointment->time }}',
                    description: 'Cita para {{ $appointment->pet->name }} con el servicio {{ $appointment->offering->name }}.',
                },
                @endforeach
            ],
            eventRender: function(event, element) {
                element.attr('title', event.description); // Tooltip para las citas
            }
        });
    });
</script>
@endsection
