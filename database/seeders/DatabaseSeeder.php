<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\worker;
use App\Models\product;
use App\Models\areas;



use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com', 
            'password' => bcrypt('admin'),  
        ]);
        product::factory()->create([
            'name' => 'Cubano',
            'large' => 12.2,
            'diameter' => 2.2,
            'price' => 1.40,
            'description' => 'Elaborado con las mejores Hojas cultivadad en Cuba',
        ]);
        areas::factory()->create([
            'name' => 'Despalillado',
            'description' => 'Área encargada del despalillado',
        ]);
        worker::factory()->create([
            'name' => 'Jefferson',
            'middle_name' => 'Jonathan',
            'last_name' => 'Briones',
            'middle_last_name' => 'Montoya',
            'email' => 'jefferson.prueba@gmail.com',
            'numbre_phone' => '+505 57257601',
            'areas_id' => 1,
        ]);
    }
}