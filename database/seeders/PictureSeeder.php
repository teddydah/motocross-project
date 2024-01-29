<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pictures')->insert([
            'image' => 'auribail_65b7981d0a597.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'auribail_65b79851aa417.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);
    }
}
