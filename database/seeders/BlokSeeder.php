<?php

namespace Database\Seeders;

use App\Models\BlokModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        BlokModel::create([
            'id' => 1,
            'namaBlok' => 'Random stasiun I',
            'telpBlok'=>'(023)131-2032',
            'alamatBlok'=>'jl.Siliwangi'
        ]);

        BlokModel::create([
            'id' => 2,
            'namaBlok' => 'Random stasiun II',
            'telpBlok'=>'(023)122-3511',
            'alamatBlok'=>'Jl.mekar sucisaa'
        ]);
    }
}
