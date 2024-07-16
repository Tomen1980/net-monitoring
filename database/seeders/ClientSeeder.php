<?php

namespace Database\Seeders;

use App\Models\ClientModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientModel::create([
            'id' => 3,
            'namaClient' => 'My wifi hotspot',
            'ipAddress' => '192.168.43.1', 
            'status' => 'Connected',
            'blok_id' => 1
        ]);

        ClientMOdel::create([
            'id' => 5,
            'namaClient' => 'Random Host',
            'ipAddress' => '145.52.12.1', 
            'status' => 'Connected',
            'blok_id' => 2
        ]);
    }
}
