<?php

namespace Database\Factories;

use App\Models\Gestante;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gestante>
 */
class GestanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Gestante::class;
    public function definition(): array
    {
        return [
            //
            'Fecha_prenez' => $this->faker->date(),
            'Fecha_estimada' => $this->faker->date(),
            'Fecha_parto' => $this->faker->date(),
            'crias' => $this->faker->randomElement(['1', '2', '3']),
            'animal_id' => Animal::factory(),
        ];
    }
}
