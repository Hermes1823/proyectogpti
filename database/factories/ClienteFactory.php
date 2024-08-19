<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cliente::class;
    public function definition(): array
    {
        return [
           'DNI' => $this->faker->unique()->numerify('##########'), // Genera un DNI único
            'nombre' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'numero' => $this->faker->phoneNumber(),
            'estado' => $this->faker->boolean(), // Genera un valor booleano aleatorio

        ];
    }
}
