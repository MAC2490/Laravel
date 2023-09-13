<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Estudiantes;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $documento = 108800;

        for ($i=0; $i < 8; $i++) { 
            Estudiantes::factory()->create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'documento' => $documento++,
            ]);
        }
    }
}
