<div>
    @if ($eventos->count() > 0)
        @foreach ($eventos as $evento)
            @php
                $colPrioridad;
                switch ($evento->prioridad) {
                    case 'baja':
                        $colPrioridad = 'success';
                        break;
                    case 'normal':
                        $colPrioridad = 'info';
                        break;
                    case 'alta':
                        $colPrioridad = 'danger';
                        break;
                    default:
                        $colPrioridad = 'info';
                        break;
                }
                
                $tachado = '';
                $disabled = '';
                if (strtotime($evento->fecha . ' 00:00:00') < strtotime(date('Y-m-d') . ' 00:00:00')) {
                    $tachado = 'text-decoration-line-through';
                    $disabled = 'disabled';
                }
                $arrayFecha = explode('-', $evento->fecha);
            @endphp
            <div class="row">
                <div class="col-6 calendar-events mb-3 {{ $tachado }} " data-class="bg-info">
                    <a href="javascript:void(0)" onclick="viewEvent({{ $evento->id }})">
                        <i class="fa fa-circle text-{{ $colPrioridad }} me-2 "></i>
                        {{ $arrayFecha[2] . ': ' }}
                        {{ $evento->tema }}
                    </a>

                </div>
                
                @if ($evento->ctrAsistencia == "on" && $disabled == '')
                    <div class="col-6 text-end"><a href="{{route('control',$evento->id)}}" class="btn btn-sm btn-{{$colPrioridad}}"><i class="fas fa-tasks"></i> Asistencia</a></div>
                @endif
                

            </div>

            
        @endforeach
    @else
        <span>No se encontraron registros.</span>
    @endif

</div>
