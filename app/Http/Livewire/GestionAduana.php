<?php

namespace App\Http\Livewire;

use App\Models\Divisiones;
use App\Models\IngresoEgresoTipo;
use App\Models\Ingresos;
use Livewire\Component;
use Livewire\WithPagination;

class GestionAduana extends Component
{
    // Evita refresh en paginate
    use WithPagination;

    // Tabla
    public $search; // buscador
    public $search_div; // buscador division: EPD ADD
    public $cantidad_paginas = 5;
    public $var_orden = 'numero_ingreso';
    public $direccion = 'desc';

    // Formulario
    public $numero_ingreso, $tipo, $division, $vencimiento, $comentario; // variables
    public $open = false; // modal form

    public function updatingSearch()
    {   
        $this->resetPage();
    }

    protected $rules = [
        'numero_ingreso' => 'required',
        'tipo' => 'required',
        'division' => 'required',
        'vencimiento' => 'required',
    ];

    public function save()
    {
        $this->validate();

        Ingresos::create([
            'numero_ingreso' => $this->numero_ingreso,
            'tipo' => $this->tipo,
            'division' => $this->division,
            'vencimiento' => $this->vencimiento,
            'comentario' => $this->comentario,
        ]);

        $this->reset(['open', 'numero_ingreso', 'tipo', 'division', 'vencimiento', 'comentario']);
    }

    public function order($var_orden){
        if ($this->var_orden == $var_orden) {
            if ($this->direccion == 'desc') {
                $this->direccion = 'asc';
            } else {
                $this->direccion = 'desc';
            }
        } else {
            $this->var_orden = $var_orden;
            $this->direccion = 'desc';
        }
    }

    public function render()
    {
        if($this->search_div){
            //  Tipo
            $tipos = IngresoEgresoTipo::all();
            // Division
            $divisiones = Divisiones::all();

            // Se seleccionó Divisiones: EPD || ADD
            $ingresos = Ingresos::where('division', $this->search_div)
                ->orderBy($this->var_orden, $this->direccion)
                ->paginate($this->cantidad_paginas);

            return view('livewire.gestion-aduana', compact('ingresos', 'tipos', 'divisiones'));
        }   else {
            //  Tipo
            $tipos = IngresoEgresoTipo::all();
            // Division
            $divisiones = Divisiones::all();

            // Todos los registros
            $ingresos = Ingresos::where('tipo', 'like', '%' . $this->search . '%')
                ->orWhere('numero_ingreso', 'like', '%' . $this->search . '%')
                ->orWhere('division', 'like', '%' . $this->search . '%')
                ->orWhere('vencimiento', 'like', '%' . $this->search . '%')
                ->orderBy($this->var_orden, $this->direccion)
                ->paginate($this->cantidad_paginas);

                return view('livewire.gestion-aduana', compact('ingresos', 'tipos', 'divisiones'));
        }
    }
}
