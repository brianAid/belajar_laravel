<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('guru')->insert([
                'nama' => $faker->name,
                'mapel' => $faker->randomElement(['Matematika', 'Bahasa Indonesia', 'Bahasa Inggris', 'IPA', 'IPS', 'Seni Budaya', 'PJOK']),
                'umur' => $faker->numberBetween(25, 60)
            ]);
        }
    }
}
