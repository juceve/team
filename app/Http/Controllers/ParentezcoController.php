<?php

namespace App\Http\Controllers;

use App\Models\Parentezco;
use Illuminate\Http\Request;

/**
 * Class ParentezcoController
 * @package App\Http\Controllers
 */
class ParentezcoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:parentezcos.index')->only('index');
        $this->middleware('can:parentezcos.create')->only('create','store');
        $this->middleware('can:parentezcos.edit')->only('update','edit');
        $this->middleware('can:parentezcos.destroy')->only('destroy');        
    }
    public function index()
    {
        $parentezcos = Parentezco::paginate();

        return view('parentezco.index', compact('parentezcos'))
            ->with('i', (request()->input('page', 1) - 1) * $parentezcos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentezco = new Parentezco();
        return view('parentezco.create', compact('parentezco'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Parentezco::$rules);

        $parentezco = Parentezco::create($request->all());

        return redirect()->route('parentezcos.index')
            ->with('success', 'Parentezco creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parentezco = Parentezco::find($id);

        return view('parentezco.show', compact('parentezco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentezco = Parentezco::find($id);

        return view('parentezco.edit', compact('parentezco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Parentezco $parentezco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parentezco $parentezco)
    {
        request()->validate(Parentezco::$rules);

        $parentezco->update($request->all());

        return redirect()->route('parentezcos.index')
            ->with('success', 'Parentezco actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $parentezco = Parentezco::find($id)->delete();

        return redirect()->route('parentezcos.index')
            ->with('success', 'Parentezco eliminado!');
    }
}
