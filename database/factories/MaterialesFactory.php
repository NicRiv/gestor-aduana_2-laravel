<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materiales>
 */
class MaterialesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => 'Material ' . $this->faker->unique()->randomLetter(),
            'comentario' => $this->faker->text(),
            'activo' => $this->faker->boolean()
        ];
    }
}
