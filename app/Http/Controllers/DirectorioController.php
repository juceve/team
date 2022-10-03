<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Directorio;
use App\Models\Directoriocargo;
use Illuminate\Http\Request;

/**
 * Class DirectorioController
 * @package App\Http\Controllers
 */
class DirectorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorios = Directorio::all();

        return view('directorio.index', compact('directorios'))
            ->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directorio = new Directorio();

        return view('directorio.create', compact('directorio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Directorio::$rules);

        $directorio = Directorio::create($request->all());

        return redirect()->route('directorios.index')
            ->with('success', 'Directorio creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $directorio = Directorio::find($id);
        $integrantes = Directoriocargo::where('directorio_id', $directorio->id)->get();
        return view('directorio.show', compact('directorio', 'integrantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directorio = Directorio::find($id);

        return view('directorio.edit', compact('directorio'));
    }

    public function integrantes($id)
    {
        $directorio = Directorio::find($id);

        return view('directorio.integrantes', compact('directorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Directorio $directorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directorio $directorio)
    {
        request()->validate(Directorio::$rules);

        $directorio->update($request->all());

        return redirect()->route('directorios.index')
            ->with('success', 'Directorio actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $directorio = Directorio::find($id)->delete();

        return redirect()->route('directorios.index')
            ->with('success', 'Directorio Eliminado correctamente');
    }
}
