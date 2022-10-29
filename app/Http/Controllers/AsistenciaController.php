<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Asociado;
use App\Models\Evento;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{

    public function show($evento_id)
    {
        $evento = Evento::find($evento_id);
        if (strtotime($evento->fecha . ' 00:00:00') != strtotime(date('Y-m-d') . ' 00:00:00')) { //si el evento es pasado ya no carga la pantalla de Control de asistencias
            return redirect()->route('eventos.index')
            ->with('warning', 'Hoy no es el día del Evento');
        } else { //Si no carga la lista de asistencias
            $evento = Evento::find($evento_id);
            return view('asistencia.show', compact('evento'));
        }
    }

    public function info($id){
        $asistencia = Asistencia::find($id);
         $data["data"] = array([
            "asociado" => $asistencia->asociado->persona->apellidos.' '.$asistencia->asociado->persona->nombres,
            "dateMarcacion" => date_format($asistencia->updated_at, 'Y-m-d H:i:s'),
            "tipoasistencia" =>$asistencia->tipoasistencia,
            "estado" => $asistencia->estado
         ]);
        return response()->json($data);
    }

}
