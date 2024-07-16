<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Agung Setiawan',
            'email' => 'agung@setiawan',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'id' => 2,
            'name' => 'Agung Setiawan2',
            'email' => 'agung@setiawan2',
            'password' => Hash::make('password'),
            'role' => 'operator',
        ]);
    }
}
