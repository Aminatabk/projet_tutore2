<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création des utilisateurs de test pour les différents rôles
        \App\Models\User::factory()->create([
            'name' => 'Admin Somagep',
            'email' => 'admin@somagep.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Agent Somagep',
            'email' => 'agent@somagep.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'agent',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Client Somagep',
            'email' => 'client@somagep.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'client',
        ]);
    }
}
