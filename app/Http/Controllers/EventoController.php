<?php

namespace App\Http\Controllers;

use App\Models\Asociado;
use App\Models\Evento;
use App\Models\Grado;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class EventoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:eventos.index')->only('index');
        $this->middleware('can:eventos.create')->only('create');
        $this->middleware('can:eventos.edit')->only('edit');
        $this->middleware('can:eventos.destroy')->only('destroy');
        $this->middleware('can:eventos.deleted')->only('deleted');
        
    }

    public function index()
    {

        $asociados = Asociado::all();
        $grados = Grado::all();

        return view('evento.index', compact('asociados', 'grados'));
    }

    public function create()
    {
        $evento = new Evento();
        return view('evento.create', compact('evento'));
    }

    public function store(Request $request)
    {
        request()->validate(Evento::$rules);

        $evento = Evento::create($request->all());

        return redirect()->route('eventos.index')
            ->with('success', 'Evento creado correctamente.');
    }

    public function show($id)
    {
        $evento = Evento::find($id);

        return view('evento.show', compact('evento'));
    }

    public function edit($id)
    {
        $grados = Grado::all()->pluck('nombre', 'id');
        $asociados = Asociado::all();
        $evento = Evento::find($id);

        return view('evento.edit', compact('evento','grados','asociados'));
    }

    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);

        $evento->update($request->all());

        return redirect()->route('eventos.index')
            ->with('success', 'Evento actualizado correctamente');
    }

    public function destroy($id)
    {
        $evento = Evento::find($id)->delete();

        return redirect()->route('eventos.index')
            ->with('success', 'Evento eliminado correctamente');
    }

    public function allEvents()
    {
        $eventos = Evento::all();
        $data = array();
        foreach ($eventos as $evento) {
            $color = "";
            switch ($evento->prioridad) {
                case 'baja':
                    $color = "green";
                    break;
                case 'normal':
                    $color = "blue";
                    break;
                case 'alta':
                    $color = "red";
                    break;
            }
            $array = array("id" => $evento->id ,"title" => $evento->tema, "start" => $evento->fecha . " " . $evento->hora . ":00", "color" => $color);
            $data[] = $array;
        }
        return response()->json($data);
    }
}
