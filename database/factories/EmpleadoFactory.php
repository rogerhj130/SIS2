<?php

namespace Database\Factories;
use App\Models\Empleado;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Empleado::class;

    public function definition(): array
    {
        return [
            'nombreCompleto' => $this->faker->name,
            'ci' => $this->faker->unique()->numerify('##########'),
            'telefono' => $this->faker->phoneNumber,
            'fechaNacimiento' => $this->faker->date('Y-m-d', '2000-01-01'), // Fecha aleatoria entre
            'email' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->text(100), 
        ];
    }
}
    