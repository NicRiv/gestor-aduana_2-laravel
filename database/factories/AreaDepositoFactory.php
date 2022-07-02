<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AreaDeposito>
 */
class AreaDepositoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->randomElement([
                'Sector Externo 1',
                'Sector Externo 2',
                'Sector Externo 3',
                'Sector Externo 4',
                'Sector Interno 1',
                'Sector Interno 2',
                'Sector Interno 3',
                'Sector Interno 4',
                'Almacen Las Rosas',
                'Almacen Los Paraisos'
            ]),
            'deposito' => $this->faker->randomElement([
                'San Martin',
                'Moreno',
                'Lanus',
                'La Plata',
                'Belgrano',
                'Recoleta',
                'Retiro',
                'Avellaneda'
            ]),
            'comentario' => $this->faker->text(),
            'activo' => $this->faker->boolean()
        ];
    }
}
