<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Divisiones>
 */
class DivisionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->randomElement(['EPD', 'ADD']),
            'descripcion' => $this->faker->text(),
            'activo' => $this->faker->boolean()
        ];
    }
}
