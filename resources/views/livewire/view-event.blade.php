<div>
    @if (!is_null($eventoSel))
        <table class="table table-striped border">
            <thead>
                @php
                    $color = 'success';
                    switch ($eventoSel->prioridad) {
                        case 'baja':
                            $color = 'success';
                            break;
                        case 'normal':
                            $color = 'info';
                            break;
                        case 'alta':
                            $color = 'danger';
                            break;
                    }
                @endphp
                <tr class="table-{{ $color }}">
                    <th colspan="2" class="text-center">
                        <strong>TITULO: </strong>{{ strtoupper($eventoSel->tema) }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Fecha:</strong>
                        {{ $eventoSel->fecha }}
                    </td>
                    <td>
                        <strong>Hora:</strong>
                        {{ $eventoSel->hora }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Responsable:</strong>
                        {{ $eventoSel->asociado->persona->apellidos . ' ' . $eventoSel->asociado->persona->nombres }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Grado de Participación:</strong>
                        {{ $eventoSel->grado->nombre }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Prioridad:</strong>
                        {{ strtoupper($eventoSel->prioridad) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Control Asistencia:</strong>
                        @if ($eventoSel->ctrAsistencia == 'on')
                            SI
                        @else
                            NO
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Notas:</strong>
                        {{ $eventoSel->notas }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="form-group text-start">
            <form action="{{ route('eventos.destroy', $eventoSel->id) }}" class="deleted" method="POST"
                id="deleteEvento">
                @csrf
                @method('DELETE')
            </form>
            <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Cerrar</button>
            @can('eventos.edit')
                <a class="btn btn-primary px-5" href="{{ route('eventos.edit', $eventoSel->id) }}"><i
                        class="fa fa-fw fa-edit"></i>
                    Editar</a>
            @endcan

            @can('eventos.destroy')
                <button class="btn btn-danger px-5" onclick="eliminar()"><i class="fas fa-trash"></i> Eliminar</button>
            @endcan

        </div>
    @else
        <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">Cerrar</button>
    @endif

    <script>
        function eliminar() {
            Swal.fire({
                title: 'Eliminar Evento?',
                text: "Esta seguro de realizar esta acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteEvento').submit();
                }
            })
        }
    </script>
</div>
