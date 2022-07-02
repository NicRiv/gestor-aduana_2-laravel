<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingresos>
 */
class IngresosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero_ingreso' => $this->faker->numerify('########'),
            'tipo' => $this->faker->randomElement(['exportacion', 'importacion']),
            'division' => $this->faker->randomElement(['EPD', 'ADD']),
            'vencimiento' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'comentario' => $this->faker->text()
        ];
    }
}
