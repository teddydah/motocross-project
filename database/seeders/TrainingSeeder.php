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
            'name' => 'Auribail mx track',
            'max_people' => NULL,
            'track' => 'MX',
            'license_type' => 'UFOLEP, FFM',
            'length' => 1950,
            'width' => 8,
            'nature_of_land' => 'Terre argileuse',
            'address' => 'Le Petayre Rossignol – Lieu dit Peyret',
            'zip_code' => '31190',
            'city' => 'Auribail',
            'latitude' => '43.34192221833587',
            'longitude' => '1.357055980850652',
            'description' => 'Sanitaire, douche, club house, électricité, terrain technique et école de pilotage à disposition.'
        ]);
    }
}
