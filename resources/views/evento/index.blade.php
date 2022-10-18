@extends('layouts.app')

@section('css')
    <link href="{{ asset('admin/assets/libs/fullcalendar5/main.css') }}" rel="stylesheet" />
@endsection

@section('title-page')
    Calendario |
@endsection

@section('title-content')
    <i class="me-2 mdi mdi-calendar"></i> CALENDARIO DE ACTIVIDADES
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4">
                <h2 class="h5">Eventos del Mes</h4>
                    <div id="calendar-events" class="">
                        @livewire('eventos-mes', ['mes' => date('m')])
                    </div>
                    <!-- checkbox -->

                    <div class="d-grid gap-2">
                        @can('eventos.create')
                            <button
                                class="d-flex align-items-center justify-content-center btn mt-3 btn-info d-block waves-effect waves-light "
                                onclick="limpiaModal();$('#modalEventDay').modal('show');">
                                <i class="mdi mdi-plus fs-4 me-1"></i>
                                Agregar Nuevo Evento
                            </button>
                        @endcan
                    </div>

            </div>
            <div class="col-9 col-sm-12 col-md-8 d-none d-sm-block">
                <div class="card-body b-l calender-sidebar">
                    <div id="calendar"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- MODALES -->

    <!-- MODAL EVENTOS DEL DIA  -->
    <div class="modal fade" id="modalEventDay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">REGISTRAR NUEVO EVENTO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('eventos.store') }}" class="form-horizontal" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="card">
                            @can('eventos.create')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fecha" class="col-3 control-label col-form-label mt-2">Fecha:</label>
                                        <div class="col-9 col-sm-4">
                                            <input type="date" class="form-control mt-2" name="fecha" id="fecha"
                                                style="width:100%" required>
                                        </div>
                                        @error('fecha')
                                            <span class="text-danger">{{ message }}</span>
                                        @enderror

                                        <label for="hora"
                                            class="col-3 col-sm-2 control-label col-form-label mt-2">Hora:</label>
                                        <div class="col-9 col-sm-3">
                                            <input type="time" class="form-control mt-2" name="hora" id="hora"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tema" class="col-3 control-label col-form-label">Titulo:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" name="tema" id="tema"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gradoParticipacion"
                                            class="col-3 control-label col-form-label">Grado:</label>
                                        <div class="col-9">
                                            <select name="grado_id" id="grado" class="select2" style="width: 100%" required>
                                                <option value="">-- Grado mínimo --</option>
                                                @if ($grados->count() > 0)
                                                    @foreach ($grados as $grado)
                                                        <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="responsable" class="col-3 control-label col-form-label">Responsable:</label>
                                        <div class="col-9">
                                            <select name="asociado_id" id="responsable" class="select2" style="width: 100%"
                                                required>
                                                <option value="">-- Responsable --</option>
                                                @if ($asociados->count() > 0)
                                                    @foreach ($asociados as $asociado)
                                                        <option value="{{ $asociado->id }}">
                                                            {{ $asociado->persona->apellidos . ' ' . $asociado->persona->nombres }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="prioridad" class="col-3 control-label col-form-label">Prioridad:</label>
                                        <div class="col-9">
                                            <select name="prioridad" id="prioridad" class="select2" style="width: 100%"
                                                required>
                                                <option value="baja"> Baja</option>
                                                <option value="normal" selected> Normal</option>
                                                <option value="alta"> Alta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="anotaciones" class="col-3 control-label col-form-label ">Asistencia:</label>
                                        <div class="col-9">
                                            <div class="form-check form-switch mt-2">
                                                <input id="ctrAsistencia" class="form-check-input rounded-pill"
                                                    type="checkbox" role="switch" name="ctrAsistencia">
                                                <label class="form-check-label" for="ctrAsistencia">Controlar
                                                    asistencia</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="notas" class="col-3 control-label col-form-label">Notas:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" name="notas" id="notas"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 text-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                            style="width: 8rem">Cerrar</button>

                                        <button type="submit" class="btn btn-info" style="width: 8rem"><i
                                                class="fas fa-save"></i> Registrar</button>
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="modal fade" id="modalVistaPrev" tabindex="-1" aria-labelledby="modalVistaPrevLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="h5">DETALLES DEL EVENTO</h2>
                </div>
                <div class="modal-body">
                    @livewire('view-event')
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODALES -->
@endsection
@section('js')
    <script src="{{ asset('admin/assets/libs/fullcalendar5/main.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/fullcalendar5/locales/es.js') }}"></script>

    @if (session('success') != '')
        {
        <script>
            Swal.fire(
                'Excelente!',
                '{{ session('success') }}',
                'success'
            );
        </script>
        }
    @endif

    <script>
        // INICIALIZACION DEL COMPONENTE CALENDAR CON TODAS SUS CONFIGURACIONES INICIALES
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'standard',
                customButtons: {
                    btnToday: {
                        text: 'Hoy',
                        click: function() {
                            calendar.today();
                            var titulo = $('#fc-dom-1').html();
                            const myArray = titulo.split(" ");
                            Livewire.emit('cambiaMes', myArray[0].toUpperCase());
                        }
                    }
                },
                headerToolbar: {
                    center: 'title',
                    end: 'timeGridDay,dayGridMonth,listMonth',
                    start: 'prev btnToday next'
                },
                timeZone: 'America/La_Paz',
                selectable: true,
                locale: 'es',
                eventSources: [{
                        url: "{{ route('events') }}",
                    }

                ],

                dateClick: function(info) {
                    newEvent(info.dateStr);
                },
                eventClick: function(info) {
                    viewEvent(info.event.id);
                }
            });
            calendar.render();


        });
        /////////////////////////////////////////////////////////////////////////////////////////
        // FUNCIONES //////////////////////////////////
        function newEvent(dateSelected) {
            limpiaModal();
            var fecha = dateSelected.slice(0, 10);
            var hora = dateSelected.slice(11, dateSelected.length - 3);
            $('#fecha').val(fecha);
            $('#hora').val(hora);
            $('#modalEventDay').modal('show');
        }

        function limpiaModal() {
            $('#fecha').val('');
            $('#hora').val('');
            $('#tema').val('');
            $('#grado').val('').trigger('change.select2');
            $('#responsable').val('').trigger('change.select2');
            $('#anotaciones').val('');
            $('#prioridad').val('normal').trigger('change.select2');
            $("#ctrAsistencia").prop("checked", false);

        }

        function viewEvent(id) {
            Livewire.emit('loadView', id);
            $("#modalVistaPrev").modal('show');
        }

        // EVENTO CLICK EN LOS BOTONES NEXT Y PREV DEL CALENDARIO //////
        $('body').on('click', 'button.fc-next-button', function() {
            var titulo = $('#fc-dom-1').html();
            const myArray = titulo.split(" ");
            Livewire.emit('cambiaMes', myArray[0].toUpperCase());
        });
        $('body').on('click', 'button.fc-prev-button', function() {
            var titulo = $('#fc-dom-1').html();
            const myArray = titulo.split(" ");
            Livewire.emit('cambiaMes', myArray[0].toUpperCase());
        });
        ///////////////////////////////////////////////////////////////

      </script>
@endsection
