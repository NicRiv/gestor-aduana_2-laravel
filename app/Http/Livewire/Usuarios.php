<?php

namespace App\Http\Livewire;

use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class Usuarios extends Component
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
    public $nombre, $rol, $email, $contraseña; // variables
    public $open = false; // modal form

    protected $rules = [
        'nombre' => 'required',
        'email' => 'required',
        'contraseña' => 'required',
    ];

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->nombre,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => bcrypt($this->contraseña),
            'profile_photo_url' => "",
            'remember_token' => Str::random(10),
        ])->assignRole($this->rol);

        $this->reset(['open', 'nombre', 'rol', 'email', 'contraseña']);
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
        $roles = Role::all();
        
        $users = User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->orderBy($this->var_orden, $this->direccion)
            ->paginate($this->cantidad_paginas);

        return view('livewire.usuarios', compact('users', 'roles'));
    }
}
