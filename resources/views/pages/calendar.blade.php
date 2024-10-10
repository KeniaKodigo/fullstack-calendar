@extends('home')

@section('content')
    <div class="mt-4" id="calendar">
        
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log(@json($bookings));
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                //muestra el limite de horario es decir mostrara
                //reservacion que tengan fecha entre las 7:00am a las 7:00pm o
                //de todo el dia
                slotMinTime: '00:00',
                slotMaxTime: '24:00',
                /**
                 * formarto de como se visualiza el calendario
                 * timeGridWeek: muestra por semana y la hora
                 * dayGridMonth: muestra por dias
                 * listWeek: lista de eventos
                 */
                initialView: 'dayGridMonth',
                events: @json($bookings),
                eventContent: function(arg) {
                    // Personalizar el contenido del evento
                    const titleEl = document.createElement('div');
                    titleEl.innerHTML = arg.event.title;

                    const accommodationEl = document.createElement('div');
                    accommodationEl.innerHTML = 'Alojamiento: ' + arg.event.extendedProps.accomodation;

                    const totalAmountEl = document.createElement('div');
                    totalAmountEl.innerHTML = 'Monto total: $' + arg.event.extendedProps.total_amount;

                    const arrayOfDomNodes = [ titleEl, accommodationEl, totalAmountEl ];

                    return { domNodes: arrayOfDomNodes };
                }
            });
        calendar.render();
        });
    </script>
@endpush