<?php

namespace App\Http\Controllers;

use App\Models\Asociado;
use App\Models\Estado;
use App\Models\Grado;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class AsociadoController
 * @package App\Http\Controllers
 */
class AsociadoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:asociados.index')->only('index');
        $this->middleware('can:asociados.create')->only('create');
        $this->middleware('can:asociados.edit')->only('edit');
        $this->middleware('can:asociados.destroy')->only('destroy');
        $this->middleware('can:asociados.deleted')->only('deleted');
        $this->middleware('can:vinculos.manage')->only('vinculos');
    }

    public function index()
    {
        $asociados = Asociado::where('deleted', 0)->get();

        return view('asociado.index', compact('asociados'))
            ->with('i', 0);
    }


    public function deleted()
    {
        $asociados = Asociado::where('deleted', 1)->get();

        return view('asociado.deleted', compact('asociados'))
            ->with('i', 0);
    }

    
    public function create()
    {
        $asociado = new Asociado();
        $persona = new Persona();
        $grados = Grado::all();
        $grados = $grados->pluck('nombre', 'id')->toArray();

        $estados = Estado::all();
        $estados = $estados->pluck('nombre', 'id')->toArray();
        return view('asociado.create', compact('asociado', 'persona', 'grados', 'estados'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Persona::$rules);
        request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $persona = Persona::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,
            'fecnacimiento' => $request->fecnacimiento,
            'ocupacion' => $request->ocupacion,
        ]);

        $user = User::create([
            'name' => $persona->nombres . ' ' . $persona->apellidos,
            'email' => $persona->email,
            'password' => $persona->cedula != '' ? bcrypt($persona->cedula) : bcrypt('12345678')
        ])->assignRole('Usuario');

        $asociado = Asociado::create([
            'fecingreso' => $request->fecingreso,
            'grado_id' => $request->grado_id,
            'persona_id' => $persona->id,
            'user_id' => $user->id,
            'estado_id' => $request->estado_id,
        ]);

        return redirect()->route('asociados.index')
            ->with('success', 'Asociado registrado correctamente.');
    }

    
    public function show($id)
    {
        $asociado = Asociado::find($id);
        $persona = Persona::find($asociado->persona_id);

        return view('asociado.show', compact('asociado', 'persona'));
    }

    public function vinculos($id)
    {
        $asociado = Asociado::find($id);

        return view('asociado.vinculos', compact('asociado'));
    }
    
    public function edit($id)
    {
        $asociado = Asociado::find($id);

        $persona = Persona::find($asociado->persona_id);

        $grados = Grado::all();
        $grados = $grados->pluck('nombre', 'id')->toArray();

        $estados = Estado::all();
        $estados = $estados->pluck('nombre', 'id')->toArray();
        return view('asociado.edit', compact('asociado', 'persona', 'grados', 'estados'));
    }

    
    public function update(Request $request, Asociado $asociado)
    {
        // request()->validate(Asociado::$rules);
        request()->validate(Persona::$rules);

        // $persona->update($request->all());
        // $asociado->update($request->all());


        $persona = Persona::find($asociado->persona_id);
        $persona->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cedula' => $request->cedula,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,
            'fecnacimiento' => $request->fecnacimiento,
            'ocupacion' => $request->ocupacion,
        ]);

        $asociado->update([
            'fecingreso' => $request->fecingreso,
            'grado_id' => $request->grado_id,
            'estado_id' => $request->estado_id,
        ]);

        $user = User::find($asociado->user_id);
        $user->update([
            'name' => $persona->nombres . ' ' . $persona->apellidos,
        ]);

        return redirect()->route('asociados.index')
            ->with('success', 'Asociado editado correctamente');
    }

    
    public function destroy($id)
    {
        $asociado = Asociado::find($id);
        $user = User::find($asociado->user_id);
        if ($asociado->deleted == 1) {
            $asociado->update([
                'deleted' => 0
            ]);

            $user->update([
                'estado' => 1
            ]);
            return redirect()->route('asociados.index')
                ->with('success', 'Asociado restablecido!');
        } else {
            $asociado->update([
                'deleted' => 1
            ]);
            $user->update([
                'estado' => 0
            ]);
            return redirect()->route('asociados.index')
                ->with('success', 'Asociado eliminado!');
        }
    }
}
