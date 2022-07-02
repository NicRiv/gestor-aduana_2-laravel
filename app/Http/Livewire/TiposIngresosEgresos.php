<?php

namespace App\Http\Livewire;

use App\Models\IngresoEgresoTipo;
use Livewire\Component;
use Livewire\WithPagination;

class TiposIngresosEgresos extends Component
{
    // evita refrsh
    use WithPagination;

    // Tabla
    public $search;
    public $cantidad_paginas = 5;
    public $var_orden = 'nombre';
    public $direccion = 'desc';

    // Formulario
    public $nombre, $metodo, $descripcion, $activo; // variables
    public $open = false; // modal form

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'nombre' => 'required',
        'metodo' => 'required',
    ];

    public function save()
    {
        $this->validate();

        IngresoEgresoTipo::create([
            'nombre' => $this->nombre,
            'metodo' => $this->metodo,
            'descripcion' => $this->descripcion,
            'activo' => $this->activo == "" ? false : true,
        ]);

        $this->reset(['open', 'nombre', 'metodo', 'descripcion', 'activo']);
    }

    public function order($var_orden)
    {
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
        $tipoingresoegreso = IngresoEgresoTipo::where('nombre', 'like', '%'.$this->search.'%')
            ->orWhere('metodo', 'like', '%'.$this->search.'%')
            ->orWhere('descripcion', 'like', '%'.$this->search.'%')
            ->orWhere('activo', 'like', '%'.$this->search.'%')
            ->orderBy($this->var_orden, $this->direccion)
            ->paginate($this->cantidad_paginas);

        return view('livewire.tipos-ingresos-egresos', compact('tipoingresoegreso'));
    }
}
