<?php

namespace App\Http\Livewire;

use App\Models\Asistencia;
use App\Models\Asociado;
use App\Models\Evento;
use Livewire\Component;

class Controlasistencia extends Component
{

    public $asistencias, $marcacion, $evento_id, $grado_id;

    protected $listeners = ['marcar'];

    public function updatingMarcacion($id)
    {
        $this->marcacion = $id;
    }

    public function mount($evento_id, $grado_id)
    {
        $this->evento_id = $evento_id;
        $this->grado_id = $grado_id;
    }

    public function render()
    {
        $this->asistencias = Asistencia::where('evento_id', $this->evento_id)->get();
        
        if ($this->asistencias->count() == 0) {
            $asistentes = Asociado::where('grado_id', '>=', $this->grado_id)->get();
            foreach ($asistentes as $asistente) {
                Asistencia::create([
                    "evento_id" => $this->evento_id,
                    "asociado_id" => $asistente->id
                ]);
            }
            $this->asistencias = Asistencia::where('evento_id', $this->evento_id)->get();
        }
        $asistencias = $this->asistencias;
        return view('livewire.controlasistencia', compact('asistencias'));
    }

    public function marcar($id, $presencial, $virtual)
    {
        $tipoasistencia = "presencial";
        if ($virtual == true) {
            $tipoasistencia = 'virtual';
        }
        // $asistencia = Asistencia::where('id', $id)->update([
        //     "estado" => 'presente',
        //     "tipoasistencia" => $tipoasistencia
        // ]);
        $asistencia = Asistencia::find($id);
            $asistencia->estado = 'presente';
            $asistencia->tipoasistencia = $tipoasistencia;
            $asistencia->save();
        $asociado = Asociado::find($asistencia->asociado_id);
        $this->emit("alertSuccess", $asociado->persona->apellidos." ".$asociado->persona->nombres." - PRESENTE");
    }
}
