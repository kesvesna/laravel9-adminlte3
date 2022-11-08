<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class TrkBuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('building_trk')->insert([
            [
                'trk_id' => 3,
                'building_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
