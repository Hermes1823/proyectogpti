<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\OrdenVenta;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdenVetna>
 */
class OrdenVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrdenVenta::class;
    public function definition(): array
    {
        $dni = Cliente::inRandomOrder()->first()->DNI;
        return [
         'fecha' => $this->faker->date(),
            'direccion' => $this->faker->address(),
            'dni' => $dni,
            'total' => $this->faker->randomFloat(2, 10, 1000), // Genera un número decimal con 2 decimales
        ];
    }
}
