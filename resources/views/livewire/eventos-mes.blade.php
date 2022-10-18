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
                if (strtotime($evento->fecha . ' 00:00:00') < strtotime(date('Y-m-d') . ' 00:00:00')) {
                    $tachado = 'text-decoration-line-through';
                }
                $arrayFecha = explode('-', $evento->fecha);
            @endphp
            <div class="calendar-events mb-3 {{ $tachado }}" data-class="bg-info">
                <a href="javascript:void(0)" onclick="viewEvent({{$evento->id}})">
                    <i class="fa fa-circle text-{{ $colPrioridad }} me-2 "></i>
                    {{ $arrayFecha[2] . ': ' }}
                    {{ $evento->tema }}
                </a>
            </div>
        @endforeach
    @else
        <span>No se encontraron registros.</span>
    @endif

</div>
