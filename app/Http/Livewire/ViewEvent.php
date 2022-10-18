<?php

namespace App\Http\Livewire;

use App\Models\Asociado;
use App\Models\Evento;
use App\Models\Grado;
use Illuminate\Queue\Listener;
use Livewire\Component;

class ViewEvent extends Component
{
    public $eventoSel;

    protected $listeners = ['loadView'];

    public function loadView($id){        
        $this->eventoSel = Evento::find($id);
    }
    public function render()
    {
        
        return view('livewire.view-event');
    }
}
