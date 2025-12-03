<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class HadiahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = ['kulkas', 'tv', 'mesin cuci', 'sepeda motor', 'sepeda gunung', 'laptop', 'smartphone', 'jam tangan', 'kamera', 'headphone'];
        foreach ($nama as $n) {
            DB::table('hadiah')->insert([
                'nama_hadiah' => $n,
            ]);
        }
    }
}
