<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    //livewire acepta 3 formas de eventos
    // la primera es añadiendo un wire:click="$emit('prueba', {{ $vacante->id }})" en el boton
    //despues diciendole al controlador que escuche por ese metodo
    // protected $listeners = [ 'prueba' ];
    // public function prueba($vacante_id)
    // {
    //     dd($vacante_id);
    // }

    protected $listeners = [ 'eliminarVacante' ];

    public function eliminarVacante( Vacante $vacante)
    {
        $vacante->delete();
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(6);
        return view('livewire.mostrar-vacantes', compact('vacantes'));
    }
}
