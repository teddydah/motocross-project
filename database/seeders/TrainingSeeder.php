<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trainings')->insert([
            'name' => '',
            'max_people' => 15,
            'type' => '',
            'price' => 1,
            'length' => 1950,
            'width' => 8,
            // 'nature_of_land' => 'Terre argileuse',
            'address' => 'Le Petayre Rossignol – Lieu dit Peyret',
            'zip_code' => '31190',
            'city' => 'Auribail',
            'latitude' => '43°20 32.65',
            'longitude' => '1°21 28.70',
            'description' => 'Sanitaire, douche, club house, électricité, terrain technique et école de pilotage à disposition.'
        ]);
    }
}
