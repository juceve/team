<div>
    <div class="card">
        <div class="card-header text-white bg-info">
            <h2 class="h5">LISTADO DE PARTICIPANTES</h2>
        </div>
        <div class="card-body table-responsive" wire:ignore>
            <table class="table" id="tablaAsistentes">
                <thead>
                    <tr class="table-info">
                        <th>ASOCIADO</th>
                        <th>GRADO</th>
                        <th>TIPO ASISTENCIA</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @if ($asistencias->count() > 0)
                    @foreach ($asistencias as $asistencia)
                    <tr>
                        <td>
                            <strong>
                                {{$asistencia->asociado->persona->nombres.'
                                '.$asistencia->asociado->persona->apellidos}}
                            </strong>

                        </td>
                        <td>
                            {{$asistencia->asociado->grado->nombre}}
                        </td>
                        <td>
                            @php
                            $presencial="";
                            $virtual="";
                            $disabled="";
                            if($asistencia->tipoasistencia == "presencial")
                            {
                            $presencial = "checked";
                            }
                            else
                            {
                            $virtual = "checked";
                            }
                            if ($asistencia->estado!="ausente"){
                            $disabled = "disabled";
                            }
                            @endphp
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioTipo{{$asistencia->id}}"
                                    id="radioPresencial{{$asistencia->id}}" value="presencial" {{$presencial}}
                                    {{$disabled}}>
                                <label class="form-check-label"
                                    for="radioPresencial{{$asistencia->id}}">PRESENCIAL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radioTipo{{$asistencia->id}}"
                                    id="radioVirtual{{$asistencia->id}}" value="Virtual" {{$virtual}} {{$disabled}}>
                                <label class="form-check-label" for="radioVirtual{{$asistencia->id}}">VIRTUAL</label>
                            </div>
                        </td>
                        <td class="text-center">
                            <div id="botones{{$asistencia->id}}">
                                @if ($asistencia->estado=="ausente")
                                <button
                                    onclick="marcar({{ $asistencia->id }},radioPresencial{{$asistencia->id}}.checked,radioVirtual{{$asistencia->id}}.checked)"
                                    class="btn btn-info">
                                    <i class="fas fa-check"></i>
                                    Asistencia
                                </button>
                                @else
                                <h2 class="h4"> <span class="badge rounded-pill bg-success">PRESENTE</span></h2>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>