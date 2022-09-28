<?php

namespace App\Http\Livewire;

use App\Models\Asociado;
use App\Models\Cargo;
use App\Models\Directorio;
use App\Models\Directoriocargo;
use Livewire\Component;

class IntegrantesDirectorio extends Component
{
    public $directorio, $asociado_id, $cargo_id;
    

    public function mount($id)
    {
        $this->directorio = Directorio::find($id);
    }
    public function render()
    {
        $cargos = Cargo::all();
        $asociados = Asociado::all();
        $integrantes = Directoriocargo::where('directorio_id', $this->directorio->id)->get();
        return view('livewire.integrantes-directorio', compact('cargos', 'asociados', 'integrantes'))->extends('layouts.app');
    }

    public function save(){
        // $this->validate();
        $integrante = Directoriocargo::create([
            'directorio_id' => $this->directorio->id,
            'asociado_id' => $this->asociado_id,
            'cargo_id' => $this->cargo_id,
            'status' => 'Activo',
                      
        ]);

        $this->emit("alertSuccess");
        
    }

    public function delete($id)
    {
        Directoriocargo::find($id)->delete();        
        $this->emit("alertDanger");
        
    }
}
