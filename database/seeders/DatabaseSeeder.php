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
        // Admin User
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin1',
                'username' => 'admin1',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // Staff User
        User::updateOrCreate(
            ['email' => 'staff@example.com'],
            [
                'name' => 'staff1',
                'username' => 'staff1',
                'password' => Hash::make('password123'),
                'role' => 'staff',
            ]
        );

        // Client / Regular User
        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'user1',
                'username' => 'user1',
                'password' => Hash::make('password123'),
                'role' => 'client',
            ]
        );
    }
}