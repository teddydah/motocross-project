<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            'training_id' => 1,
            'start_date' => '2024-03-03 14:00:00',
            'end_date' => '2024-03-03 18:00:00',
            'created_at' => Date::now()
        ]);

        DB::table('schedules')->insert([
            'training_id' => 2,
            'start_date' => '2024-03-03 10:00:00',
            'end_date' => '2024-03-03 12:00:00',
            'created_at' => Date::now()
        ]);

        DB::table('schedules')->insert([
            'training_id' => 1,
            'start_date' => '2024-02-04 14:00:00',
            'end_date' => '2024-02-04 18:00:00',
            'created_at' => Date::now()
        ]);

        DB::table('schedules')->insert([
            'training_id' => 2,
            'start_date' => '2024-02-04 10:00:00',
            'end_date' => '2024-02-04 12:00:00',
            'created_at' => Date::now()
        ]);
    }
}
