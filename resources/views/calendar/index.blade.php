@extends('dashboard.admin')    
@section('content')     
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Citas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar 6 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{asset('css/calendar.css')}}" />


    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-md-11 offset-1 mt-5 mb-5">
                    <h3 class="text-center col-md-10 offset-1 mt-5 mb-5" style="background-color: pink;">Calendario de Citas</h3>

                    <div id="calendar" data-store-url="{{ route('calendar.store') }}" data-update-base="{{ route('calendar.update', '') }}"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FullCalendar 6 JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>


    <script>
        // --- Variables y Funciones Auxiliares ---
        const events = @json($events);
        const storeUrl = "{{ route('calendar.store') }}";
        const updateBaseUrl = "{{ route('calendar.update', '') }}";

        function formatForMySQL(date) {
            if (!date) return null;
            const d = new Date(date);
            return d.getFullYear() + '-' +
                String(d.getMonth() + 1).padStart(2, '0') + '-' +
                String(d.getDate()).padStart(2, '0') + ' ' +
                String(d.getHours()).padStart(2, '0') + ':' +
                String(d.getMinutes()).padStart(2, '0') + ':' +
                String(d.getSeconds()).padStart(2, '0');
        }

        async function fetchJson(url, method, payload) {
            const response = await fetch(url, {
                method,
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(payload)
            });
            if (!response.ok) {
                // Si la respuesta no es OK, lanzamos un error para que sea capturado por el catch.
                const errorData = await response.json().catch(() => ({
                    message: 'Error desconocido'
                }));
                throw new Error(errorData.message || 'No se pudo completar la operación');
            }
            return await response.json();
        }

        // --- Lógica del Calendario ---
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                editable: true,
                selectable: true,
                events: events,
                height: 700, // píxeles

           


                locale: 'es', // Opcional: para poner el calendario en español
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',

                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día',
                    list: 'Lista'
                },
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                    // Clave para forzar el formato de 24 horas
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                },
                views: {
                    dayGridMonth: {
                        selectable: false // desactiva la selección en mes
                    }
                },
                dateClick: function(info) {
                    if (info.view.type === 'dayGridMonth') {
                        // Si la vista actual es "mes", cambia a la vista de "semana" y navega a la fecha seleccionada.
                        calendar.changeView('timeGridDay', info.dateStr);

                    }
                },

                /**
                 * Se dispara al seleccionar una fecha o rango.
                 */
                select: async function(info) {
                    const {
                        value: title
                    } = await Swal.fire({
                        title: 'Crear Nuevo Evento',
                        input: 'text',
                        inputLabel: 'Nombre del evento',
                        inputPlaceholder: 'Escribe el título aquí...',
                        /* title: 'Selecciona un color para el evento',
                         input: 'color', // esto abre un selector de colores
                         inputLabel: 'Color del evento',
                         inputValue: '#3788d8',*/
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar'
                    });

                    if (!title) return;

                    const payload = {
                        title,
                        start_date: formatForMySQL(info.start),
                        end_date: formatForMySQL(info.end),
                        allDay: info.allDay
                    };

                    try {
                        const data = await fetchJson(storeUrl, 'POST', payload);
                        calendar.addEvent(data); // ✅ CORREGIDO: Usar la respuesta del servidor
                        Swal.fire('¡Listo!', 'Evento creado correctamente', 'success');
                    } catch (error) {
                        Swal.fire('Error', 'No se pudo crear el evento: ' + error.message, 'error');
                    }
                },

                /**
                 * Se dispara al arrastrar y soltar un evento.
                 */
                eventDrop: async function(info) {
                    const payload = {
                        start_date: formatForMySQL(info.event.start),
                        end_date: formatForMySQL(info.event.end),
                        allDay: info.event.allDay
                    };
                    const url = updateBaseUrl + '/' + info.event.id;

                    try {
                        await fetchJson(url, 'PATCH', payload);
                        Swal.fire('¡Bien!', 'Evento actualizado', 'success');
                    } catch (error) {
                        Swal.fire('Error', 'No se pudo actualizar el evento', 'error');
                        info.revert(); // Revertir el cambio si falla
                    }
                },

                /**
                 * Se dispara al redimensionar un evento.
                 */
                eventResize: async function(info) {
                    const payload = {
                        start_date: formatForMySQL(info.event.start),
                        end_date: formatForMySQL(info.event.end),
                        allDay: info.event.allDay
                    };
                    const url = updateBaseUrl + '/' + info.event.id;

                    try {
                        await fetchJson(url, 'PATCH', payload);
                        Swal.fire('¡Bien!', 'Evento actualizado', 'success');
                    } catch (error) {
                        Swal.fire('Error', 'No se pudo actualizar el evento', 'error');
                        info.revert(); // Revertir el cambio si falla
                    }
                },

                /**
                 * Se dispara al hacer clic en un evento.
                 */
                eventClick: async function(info) {
                    const result = await Swal.fire({
                        title: '¿Qué deseas hacer?',
                        text: `Evento: ${info.event.title}`,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Eliminar',
                        denyButtonText: 'Editar',
                        cancelButtonText: 'Cancelar'
                    });

                    if (result.isConfirmed) {
                        const url = "{{ route('calendar.destroy', '') }}/" + info.event.id;
                        try {
                            await fetchJson(url, 'DELETE', {});
                            info.event.remove();
                            Swal.fire('Eliminado', 'El evento ha sido eliminado.', 'success');
                        } catch (error) {
                            Swal.fire('Error', 'No se pudo eliminar el evento.', 'error');
                        }
                    } else if (result.isDenied) {
                        const {
                            value: newTitle
                        } = await Swal.fire({
                            title: 'Editar Evento',
                            input: 'text',
                            inputLabel: 'Nuevo título',
                            inputValue: info.event.title,
                            showCancelButton: true,
                            cancelButtonText: 'Cancelar'
                        });

                        if (newTitle && newTitle !== info.event.title) {
                            const payload = {
                                title: newTitle,
                                start_date: formatForMySQL(info.event.start),
                                end_date: formatForMySQL(info.event.end ?? info.event.start),
                                allDay: info.event.allDay
                            };
                            const url = "{{ route('calendar.update', '') }}/" + info.event.id;

                            try {
                                await fetchJson(url, 'PATCH', payload);
                                info.event.setProp('title', newTitle);
                                Swal.fire('¡Listo!', 'Evento actualizado', 'success');
                            } catch (error) {
                                Swal.fire('Error', 'No se pudo actualizar el evento.', 'error');
                            }
                        }
                    }
                }

            });
            calendar.render();
        });
    </script>
</body>


</html>



</body>

</html>
@endsection