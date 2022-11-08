<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class FloorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('floors')->insert([
                [
                    'name' => 'Этаж 1',
                'slug' => 'etazh-1',
                'trk_id' => 1,
                'building_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                    'name' => '0.000',
                    'slug' => '0.000',
                    'trk_id' => 3,
                    'building_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
