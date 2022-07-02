<?php

namespace App\Http\Livewire;

use App\Models\AreaDeposito;
use App\Models\LugarDeposito;
use Livewire\Component;
use Livewire\WithPagination;

class Areas extends Component
{
    // Evita refresh en paginate
    use WithPagination;

    // Tabla
    public $search;
    public $search_div;
    public $cantidad_paginas = 5;
    public $var_orden = 'nombre';
    public $direccion = 'desc';

    // Formulario
    public $nombre, $deposito, $comentario, $activo; // variables
    public $open = false; // modal form

    public function updatingSearch()
    {   
        $this->resetPage();
    }

    protected $rules = [
        'nombre' => 'required',
        'deposito' => 'required'
    ];

    public function save()
    {
        $this->validate();

        AreaDeposito::create([
            'nombre' => $this->nombre,
            'deposito' => $this->deposito,
            'comentario' => $this->comentario,
            'activo' => $this->activo == "" ? false : true,
        ]);

        $this->reset(['open', 'nombre', 'deposito', 'comentario', 'activo']);
    }

    // ordena tabla 
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
        if ($this->search_div) {
            $areadeposito = AreaDeposito::where('deposito', 'like', '%'.$this->search_div.'%')
                ->orderBy($this->var_orden, $this->direccion)
                ->paginate($this->cantidad_paginas);
        } else {
            $areadeposito = AreaDeposito::where('nombre', 'like', '%'.$this->search.'%')
                ->orWhere('deposito', 'like', '%'.$this->search.'%')
                ->orWhere('comentario', 'like', '%'.$this->search.'%')
                ->orWhere('activo', 'like', '%'.$this->search.'%')
                ->orderBy($this->var_orden, $this->direccion)
                ->paginate($this->cantidad_paginas);
        }

        $lugardeposito = LugarDeposito::all();

        return view('livewire.areas', compact('areadeposito', 'lugardeposito'));
    }
}
