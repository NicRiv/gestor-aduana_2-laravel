<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LugarDeposito>
 */
class LugarDepositoFactory extends Factory
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
