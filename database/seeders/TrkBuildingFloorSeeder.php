<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class TrkBuildingFloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('building_floor_trk')->insert([
            [
                'trk_id' => 3,
                'building_id' => 8,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 9,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 10,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 11,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 9,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 10,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 12,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 13,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 14,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 15,
                'building_id' => 2,
                'floor_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
