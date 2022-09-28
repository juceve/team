<?php

namespace App\Http\Controllers;

use App\Models\Directoriocargo;
use Illuminate\Http\Request;

/**
 * Class DirectoriocargoController
 * @package App\Http\Controllers
 */
class DirectoriocargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directoriocargos = Directoriocargo::paginate();

        return view('directoriocargo.index', compact('directoriocargos'))
            ->with('i', (request()->input('page', 1) - 1) * $directoriocargos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directoriocargo = new Directoriocargo();
        return view('directoriocargo.create', compact('directoriocargo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Directoriocargo::$rules);

        $directoriocargo = Directoriocargo::create($request->all());

        return redirect()->route('directoriocargos.index')
            ->with('success', 'Directoriocargo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $directoriocargo = Directoriocargo::find($id);

        return view('directoriocargo.show', compact('directoriocargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directoriocargo = Directoriocargo::find($id);

        return view('directoriocargo.edit', compact('directoriocargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Directoriocargo $directoriocargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Directoriocargo $directoriocargo)
    {
        request()->validate(Directoriocargo::$rules);

        $directoriocargo->update($request->all());

        return redirect()->route('directoriocargos.index')
            ->with('success', 'Directoriocargo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $directoriocargo = Directoriocargo::find($id)->delete();

        return redirect()->route('directoriocargos.index')
            ->with('success', 'Directoriocargo deleted successfully');
    }
}
