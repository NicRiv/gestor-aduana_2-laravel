<?php

namespace App\Http\Livewire;

use App\Models\Unidades;
use Livewire\Component;
use Livewire\WithPagination;

class UnidadesLogisticas extends Component
{
    // evita refresh 
    use WithPagination;

    // Tabla
    public $search;
    public $cantidad_paginas = 5;
    public $var_orden = 'nombre';
    public $direccion = 'desc';

    // Formulario
    public $nombre, $tipo, $comentario, $activo; // variables
    public $open = false; // modal form

    public function updatingSearch()
    {   
        $this->resetPage();
    }

    protected $rules = [
        'nombre' => 'required',
        'tipo' => 'required',
    ];

    public function save()
    {
        $this->validate();

        Unidades::create([
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'comentario' => $this->comentario,
            'activo' => $this->activo == "" ? false : true,
        ]);

        $this->reset(['open', 'nombre', 'tipo', 'comentario', 'activo']);
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
        $unidades = Unidades::where('nombre', 'like', '%'.$this->search.'%')
            ->orWhere('tipo', 'like', '%'.$this->search.'%')
            ->orWhere('comentario', 'like', '%'.$this->search.'%')
            ->orWhere('activo', 'like', '%'.$this->search.'%')
            ->orderBy($this->var_orden, $this->direccion)
            ->paginate($this->cantidad_paginas);

        return view('livewire.unidades-logisticas', compact('unidades'));
    }
}
