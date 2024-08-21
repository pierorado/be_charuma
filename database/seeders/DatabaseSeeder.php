<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Raza;
use App\Models\Animal;
use App\Models\Venta;
use App\Models\Vacuna;
use App\Models\Gestante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Generar 4 registros de Razas
        //Raza::factory()->count(4)->create();

        // Generar 4 registros de Animales
        //Animal::factory()->count(4)->create();

        // Generar 4 registros de Ventas
        //Venta::factory()->count(4)->create();

        // Generar 4 registros de Vacunas
        //Vacuna::factory()->count(4)->create();

        // Generar 4 registros de Gestaciones
       // Gestante::factory()->count(4)->create();
    }
}
