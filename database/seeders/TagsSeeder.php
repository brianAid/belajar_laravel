<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('tags')->insert([
                'article_id' => $faker->numberBetween(1, 50),
                'tag' => $faker->randomElement(['Teknologi', 'Olahraga', 'Politik', 'Kesehatan', 'Hiburan'])
            ]);
        }
    }
}
