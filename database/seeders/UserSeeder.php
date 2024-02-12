<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'lastname' => 'Doe',
            'firstname' => 'John',
            'email' => 'john.doe@gmail.com',
            'password' => '$2y$10$Y5LdAjHNd8AG6FC21GNXCuW38Y1ClEgrcinq2fC0Ib//TZv9ycHYW', // Pa$$w0rd
            'role' => 'admin',
            'license_number' => rand(00000,999999),
            'phone' => '0612345678',
            'birth_date' => '1900-01-01',
            'address' => '123 Fake Street',
            'zip_code' => '12345',
            'city' => 'Faker City'
        ]);

        DB::table('users')->insert([
            'lastname' => 'Charbon',
            'firstname' => 'Jacques',
            'email' => 'jacques.charbon@live.fr',
            'password' => '$2y$10$Y5LdAjHNd8AG6FC21GNXCuW38Y1ClEgrcinq2fC0Ib//TZv9ycHYW', // Pa$$w0rd
            'license_number' => rand(000000,999999),
            'phone' => '0612345678',
            'birth_date' => '1980-01-01',
            'address' => '123 Fake Street',
            'zip_code' => '12345',
            'city' => 'Faker City'
        ]);

        DB::table('users')->insert([
            'lastname' => 'Culkin',
            'firstname' => 'Macaulay',
            'email' => 'macaulay.culkin@yahoo.fr',
            'password' => '$2y$10$Y5LdAjHNd8AG6FC21GNXCuW38Y1ClEgrcinq2fC0Ib//TZv9ycHYW', // Pa$$w0rd
            'license_number' => rand(000000,999999),
            'phone' => '0612345678',
            'birth_date' => '2010-01-01',
            'address' => '123 Fake Street',
            'zip_code' => '12345',
            'city' => 'Faker City'
        ]);
    }
}
