<?php

namespace Database\Seeders;

use App\Models\LoggingModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class loggingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoggingModel::create([
            'id' => 1,
            'aktivitas' => 'login',
            'tanggal' => '2024-07-16',
            'waktu' => '12:00:00',
            'user_id' => 1
        ]);
        LoggingModel::create([
            'id' => 2,
            'aktivitas' => 'login',
            'tanggal' => '2024-07-18',
            'waktu' => '12:00:00',
            'user_id' => 2
        ]);
    }
}
