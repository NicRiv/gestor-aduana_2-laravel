<?php

namespace Database\Seeders;

use App\Models\Ambientes;
use App\Models\AreaDeposito;
use App\Models\Divisiones;
use App\Models\IngresoEgresoTipo;
use App\Models\Ingresos;
use App\Models\LugarDeposito;
use App\Models\Materiales;
use App\Models\Team;
use App\Models\Ubicaciones;
use App\Models\Unidades;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Ingresos::factory(10)->create();
        Materiales::factory(10)->create();
        LugarDeposito::factory(8)->create(); // hasta 8!
        AreaDeposito::factory(10)->create();

        Ubicaciones::factory(20)->create();

        Ambientes::factory(5)->create();    // hasta 5!
        Unidades::factory(7)->create();     // hasta 7!
        Divisiones::factory(2)->create();   // hasta 2!
        IngresoEgresoTipo::factory(2)->create();   // hasta 2!


        // Role Seeder
        $this->call(RoleSeeder::class);

        // crea usuario (admin@mail.com, password)
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ])->assignRole('Admin');
        User::factory()->create([
            'name' => 'Nico',
            'email' => 'nico@mail.com',
        ])->assignRole('Cliente');

        // User::factory()->create();
        Team::factory()->create(); 
    }
}
