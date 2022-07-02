<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    // evita refresh
    use WithPagination;

    // Tabla
    public $search;
    public $cantidad_paginas = 5;
    public $var_orden = 'name';
    public $direccion = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Formulario
    public $nombre; // variables
    public $list_permisos = []; // Toma los permisos asignados
    public $open = false; // modal form

    protected $rules = [
        'nombre' => 'required',
    ];

    public function save()
    {
        $this->validate();

        $nuevo_rol = Role::create([
            'name' => $this->nombre,
        ]);

        $nuevo_rol->permissions()->sync($this->list_permisos);

        $this->reset(['open', 'nombre', 'list_permisos']);
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
        $permissions = Permission::all();

        $roles = Role::where('name', 'like', '%'.$this->search.'%')
            ->orderBy($this->var_orden, $this->direccion)
            ->paginate($this->cantidad_paginas);

        return view('livewire.roles', compact('roles', 'permissions'));
    }
}
