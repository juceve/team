<?php

namespace App\Http\Livewire;

use App\Models\Asociado;
use App\Models\Parentezco;
use App\Models\Persona;
use App\Models\Vinculo;
use Livewire\Component;


class Vinculos extends Component
{
    public $asociado,$vinculos,$persona, $message, $messageDelete;
    public $nombres, $apellidos, $cedula, $celular, $parentezco_id;
    protected $rules = [
        'persona.nombres' => 'required',
        'persona.apellidos' => 'required',
        'persona.cedula' => 'required',
        'persona.celular' => 'required',
        'parentezco_id' => 'required',
    ];

    public function mount(Asociado $asociado){
        
        $this->asociado = $asociado;        
    }
    
    public function render()
    {
        $this->persona = new Persona();  
        $parentezcos = Parentezco::all();
        $this->vinculos = Vinculo::where('asociado_id',$this->asociado->id)->orderBy('parentezco_id')->get();
        return view('livewire.vinculos', compact('parentezcos'));
    }

    public function save(){
        $this->validate();
        $persona = Persona::create([
            'nombres' => $this->persona->nombres,
            'apellidos' => $this->persona->apellidos,
            'cedula' => $this->persona->cedula,
            'direccion' => 'S/D',
            'email' => $this->asociado->id . rand() . $this->parentezco_id . 's/c',
            'celular' => $this->persona->celular,            
        ]);
        $vinculo = Vinculo::create([
            'asociado_id' => $this->asociado->id,
            'persona_id' => $persona->id,
            'parentezco_id' => $this->parentezco_id,
        ]);

        $this->emit("alertSuccess");
        
    }

    public function delete($id)
    {
        $vinculo = Vinculo::find($id);
        $persona = Persona::find($vinculo->persona_id)->delete();
        $vinculo = Vinculo::find($id)->delete();
     
        $this->emit("alertDanger");
        
    }
}
