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
            'image' => 'photo-motocross_65c0e9e170567.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c0ea7d1baa8.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c0eb25b3519.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c2103c23995.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c210d096388.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c21140d09cc.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c2117551798.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c216f937980.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);

        DB::table('pictures')->insert([
            'image' => 'photo-motocross_65c2176148637.jpg',
            'description' => 'Photo Auribail Mx Park',
            'club_id' => 1,
            'created_at' => Date::now()
        ]);
    }
}
