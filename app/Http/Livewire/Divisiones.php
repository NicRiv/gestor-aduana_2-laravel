<?php

namespace App\Http\Livewire;

use App\Models\Divisiones as DivisionesTabla;
use Livewire\Component;
use Livewire\WithPagination;

class Divisiones extends Component
{
    // evita refresh
    use WithPagination;

    // Tabla
    public $search;
    public $cantidad_paginas = 5;
    public $var_orden = 'nombre';
    public $direccion = 'desc';

    // Formulario
    public $nombre, $descripcion, $activo; // variables
    public $open = false; // modal form

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'nombre' => 'required',
    ];

    public function save()
    {
        $this->validate();

        DivisionesTabla::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'activo' => $this->activo == "" ? false : true,
        ]);

        $this->reset(['open', 'nombre', 'descripcion', 'activo']);
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
        $divisiones = DivisionesTabla::where('nombre', 'like', '%'.$this->search.'%')
            ->orWhere('descripcion', 'like', '%'.$this->search.'%')
            ->orWhere('activo', 'like', '%'.$this->search.'%')
            ->orderBy($this->var_orden, $this->direccion)
            ->paginate($this->cantidad_paginas);

        return view('livewire.divisiones', compact('divisiones'));
    }
}
