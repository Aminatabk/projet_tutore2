<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Compte administrateur par défaut pour les tests
        User::firstOrCreate(
            ['email' => 'admin@somagep.com'],
            [
                'name' => 'Admin SOMAGEP',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
    }
}