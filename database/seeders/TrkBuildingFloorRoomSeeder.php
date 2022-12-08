<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class TrkBuildingFloorRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('trk_building_floor_room')->insert([
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 2,
                'room_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 3,
                'room_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 3,
                'room_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 3,
                'room_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 3,
                'room_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 16,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 2,
                'room_id' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 2,
                'room_id' => 19,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 3,
                'room_id' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 3,
                'building_id' => 2,
                'floor_id' => 3,
                'room_id' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'trk_id' => 1,
                'building_id' => 2,
                'floor_id' => 30,
                'room_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
