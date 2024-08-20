<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Raza;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Animal::class;
    
    public function definition(): array
    {
        return [
           'arete' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'ingreso' => $this->faker->randomElement(['Nacimiento', 'Compra']),
            'nombre_animal' => $this->faker->firstName,
            'fecha' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['Macho', 'Hembra']),
            'clasificacion' => $this->faker->randomElement(['Vacas', 'Toros', 'Terneros', 'Terneras', 'Vaquillonas']),
            'precio_compra' => $this->faker->randomFloat(2, 1000, 5000),
            'estado' => $this->faker->randomElement(['Activo', 'Muerto', 'Vendido']),
            'raza_id' => Raza::factory(),
        ];
    }
}
