<?php

namespace Database\Factories;
use App\Models\Raza;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Raza>
 */
class RazaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Raza::class;
    
    public function definition(): array
    {
        return [
            'nombre_raza' => $this->faker->word,
        ];
    }
}
