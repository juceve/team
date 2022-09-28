<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

/**
 * Class GradoController
 * @package App\Http\Controllers
 */
class GradoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:grados.index')->only('index');
        $this->middleware('can:grados.create')->only('create','store');
        $this->middleware('can:grados.edit')->only('update','edit');
        $this->middleware('can:grados.destroy')->only('destroy');        
    }

    public function index()
    {
        $grados = Grado::all();

        return view('grado.index', compact('grados'))
            ->with('i', 0);
    }


    public function create()
    {
        $grado = new Grado();
        return view('grado.create', compact('grado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Grado::$rules);

        $grado = Grado::create($request->all());

        return redirect()->route('grados.index')
            ->with('success', 'Grado creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grado = Grado::find($id);

        return view('grado.show', compact('grado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grado = Grado::find($id);

        return view('grado.edit', compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grado $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        request()->validate(Grado::$rules);

        $grado->update($request->all());

        return redirect()->route('grados.index')
            ->with('success', 'Grado actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grado = Grado::find($id)->delete();

        return redirect()->route('grados.index')
            ->with('success', 'Grado eliminado.');
    }
}
