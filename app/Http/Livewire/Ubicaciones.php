<?php

namespace App\Http\Livewire;

use App\Models\AreaDeposito;
use App\Models\Ambientes;
use App\Models\Unidades;
use App\Models\LugarDeposito;

use App\Models\Ubicaciones as UbicacionesTabla;

use Livewire\Component;
use Livewire\WithPagination;

class Ubicaciones extends Component
{
    // evita refresh
    use WithPagination;

    // Tabla
    public $search; // buscador
    public $search_div; // buscador Ubicaciones > Areas
    public $cantidad_paginas = 5;
    public $var_orden = 'nombre';
    public $direccion = 'desc';

    // Formulario
    public $deposito, $area, $nombre, $condicion, $unidad_logistica, $cantidad_almacenaje, $comentarios, $activo; // variables
    public $open = false; // modal form

    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'deposito' => 'required',
        'area' => 'required',
        'nombre' => 'required',
        'condicion' => 'required',
        'unidad_logistica' => 'required',
        'cantidad_almacenaje' => 'required',
    ];

    public function save()
    {
        $this->validate();

        UbicacionesTabla::create([
            'deposito' => $this->deposito,
            'area' => $this->area,
            'nombre' => $this->nombre,
            'condicion' => $this->condicion,
            'unidad_logistica' => $this->unidad_logistica,
            'cantidad_almacenaje' => $this->cantidad_almacenaje,
            'comentarios' => $this->comentarios,
            'activo' => $this->activo,
        ]);

        $this->reset(['open', 'deposito', 'area', 'nombre', 'condicion', 'unidad_logistica', 'cantidad_almacenaje', 'comentarios', 'activo']);
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
        $areas = AreaDeposito::all();
        $ambientes = Ambientes::all();
        $unidades = Unidades::all();
        $depositos = LugarDeposito::all();

        if ($this->search_div) {
            // Se seleccionó Ubicaciones > Areas: [sector 1, ...]
            $ubicaciones = UbicacionesTabla::where('area', $this->search_div)
                ->orderBy($this->var_orden, $this->direccion)
                ->paginate($this->cantidad_paginas);

            return view('livewire.ubicaciones', compact('areas', 'ambientes', 'unidades', 'depositos', 'ubicaciones'));
        } else {
            // Todos los registros
            $ubicaciones = UbicacionesTabla::where('area', 'like', '%' . $this->search . '%')
                ->orWhere('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('condicion', 'like', '%' . $this->search . '%')
                ->orWhere('unidad_logistica', 'like', '%' . $this->search . '%')
                ->orWhere('comentarios', 'like', '%' . $this->search . '%')
                ->orderBy($this->var_orden, $this->direccion)
                ->paginate($this->cantidad_paginas);

            return view('livewire.ubicaciones', compact('areas', 'ambientes', 'unidades', 'depositos', 'ubicaciones'));
        }
    }
}
