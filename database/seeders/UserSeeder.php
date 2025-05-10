<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Elimina los usuarios existentes (opcional)
        DB::table('users')->truncate();

        // Inserta usuarios manualmente
        DB::table('users')->insert([
            [
                'name' => 'Erick Perez',
                'role' => 'admin',
                'email' => 'ericksperezc@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User1prueba',
                'role' => 'admin',
                'email' => 'user1prueba@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User2',
                'role' => 'user',
                'email' => 'user2@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
