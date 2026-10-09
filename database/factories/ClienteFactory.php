<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'tipoDocumento' => $this->faker->randomElement(['01', '02', '03']),
            'numeroDocumento' => $this->faker->unique()->numerify('########'),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->numerify('9########'),
        ];
    }
}
