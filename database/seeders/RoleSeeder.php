<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'Link Administración'])->assignRole($role1);

        Permission::create(['name' => 'Crear Materiales'])->assignRole($role1);
        Permission::create(['name' => 'Crear Depósito'])->assignRole($role1);
        Permission::create(['name' => 'Crear Área'])->assignRole($role1);
        Permission::create(['name' => 'Crear Ubicación'])->assignRole($role1);
        Permission::create(['name' => 'Crear Condición Ambiental'])->assignRole($role1);
        Permission::create(['name' => 'Crear Unidad Logística'])->assignRole($role1);
        Permission::create(['name' => 'Crear Division'])->assignRole($role1);
        Permission::create(['name' => 'Crear Tipo ingreso/egreso'])->assignRole($role1);
    }
}