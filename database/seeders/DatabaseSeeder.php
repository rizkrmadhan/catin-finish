<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\catin;


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
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@test.com',
            'role' => 'user',
            'password' => bcrypt('user')
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'role' => 'user',
            'password' => Hash::make('password'),
        ]);
        catin::factory(10)->create();
    }
}
