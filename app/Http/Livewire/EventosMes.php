<?php

namespace App\Http\Livewire;

use App\Models\Evento;
use Livewire\Component;

class EventosMes extends Component
{
    public $eventos, $mes;
    protected $listeners = ['cambiaMes'];

    public function mount($mes)
    {
        $this->eventos = Evento::whereMonth('fecha', $mes)->orderBy('fecha','asc')->get();
    }


    public function cambiaMes($mes)
    {
        $this->mes = $mes;
        $month = '';
        if (!ctype_digit($mes)) {

            switch ($mes) {
                case 'ENERO':
                    $month = 1;
                    break;
                case 'FEBRERO':
                    $month = 2;
                    break;
                case 'MARZO':
                    $month = 3;
                    break;
                case 'ABRIL':
                    $month = 4;
                    break;
                case 'MAYO':
                    $month = 5;
                    break;
                case 'JUNIO':
                    $month = 6;
                    break;
                case 'JULIO':
                    $month = 7;
                    break;
                case 'AGOSTO':
                    $month = 8;
                    break;
                case 'SEPTIEMBRE':
                    $month = 9;
                    break;
                case 'OCTUBRE':
                    $month = 10;
                    break;
                case 'NOVIEMBRE':
                    $month = 11;
                    break;
                case 'DICIEMBRE':
                    $month = 12;

                    break;
            }
            $this->eventos = Evento::whereMonth('fecha', $month)->orderBy('fecha','asc')->get();
        }
    }
    public function render()
    {
        // $eventos = Evento::whereMonth(('fecha'), $this->mes)->get();
        return view('livewire.eventos-mes');
    }

    function cargaEventos($mes)
    {


        return $month;
    }
}
