<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = faker::create();
        $documento = 108800; 

        for ($i=0; $i < 8; $i++) { 
            \App\Models\Estudiantes::factory()->create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'documento' => $documento++,
            ]);
        }
    }
}
