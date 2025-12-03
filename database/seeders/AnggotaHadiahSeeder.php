<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use faker\Factory as Faker;
class AnggotaHadiahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pengguna = DB::table('pengguna')->get();
        $hadiahIds = DB::table('hadiah')->pluck('id')->toArray();

        foreach ($pengguna as $p) {
            $assignCount = rand(1, 3);
            $assigned = [];

            for ($i = 0; $i < $assignCount; $i++) {
                $hadiahId = $hadiahIds[array_rand($hadiahIds)];
                if (in_array($hadiahId, $assigned)) {
                    continue;
                }
                $assigned[] = $hadiahId;

                DB::table('anggota_hadiah')->insert([
                    'pengguna_id' => $p->id,
                    'hadiah_id' => $hadiahId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
