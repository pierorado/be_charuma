<?php

namespace Database\Factories;

use App\Models\Vacuna;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacuna>
 */
class VacunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vacuna::class;

    public function definition(): array
    {
        return [
            'nombre_vacuna' => $this->faker->word,
            'Fecha_administrada' => $this->faker->date(),
            'Fecha_programada' => $this->faker->date(),
            'animal_id' => Animal::factory(),
        ];
    }
}
