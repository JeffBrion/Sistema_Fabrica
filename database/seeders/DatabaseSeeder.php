<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Crear un usuario 'admin' con un nombre y contraseña específicos
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com', 
            'password' => bcrypt('admin'),  
        ]);
    }
}