<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ubicaciones>
 */
class UbicacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
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
            'area' => $this->faker->randomElement([
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
            'nombre' => 'UB'.$this->faker->randomElement(['EXT','INT']).$this->faker->unique()->randomNumber(3),
            'condicion' => $this->faker->randomElement([
                'Frio',
                'Templado',
                'Refrigeracion',
                'Humedad Baja', 
                'Caliente'
            ]),
            'unidad_logistica' => $this->faker->randomElement([
                'Pallet',
                'Caja',
                'Contenedor',
                'Bulto', 
                'Clark',
                'Cinta',
                'Tambor'
            ]),
            'cantidad_almacenaje' => $this->faker->randomNumber(4, true),
            'cantidad_disponible' => $this->faker->randomNumber(3, true),
            'stock' => $this->faker->randomNumber(2, true),
            'comentarios' => $this->faker->text(),
            'activo' => $this->faker->boolean()
        ];
    }
}
