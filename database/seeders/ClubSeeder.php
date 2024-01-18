<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clubs')->insert([
            'name' => 'Moto-Club Auribail',
            'address' => 'Mairie de Auribail',
            'zip_code' => '31190',
            'city' => 'Auribail',
            'latitude' => NULL,
            'longitude' => NULL,
            'phone' => '05 61 50 71 61',
            'email' => 'daniel.raymond09@orange.fr',
            'social_network_link' => 'https://www.facebook.com/auribail.motosport/',
            'description' => NULL
        ]);
    }
}
