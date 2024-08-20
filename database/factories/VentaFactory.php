<?php

namespace Database\Factories;

use App\Models\Venta;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Venta::class;

    public function definition(): array
    {
        return [
            'nombre_propietario' => $this->faker->name,
            'fecha' => $this->faker->date(),
            'precio' => $this->faker->randomFloat(2, 1000, 10000),
            'animal_id' => Animal::factory(),
        ];
    }
}
