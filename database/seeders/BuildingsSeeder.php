<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class BuildingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('buildings')->insert([
                [
                    'name' => 'Блок 1',
                'slug' => 'block-1',
                'trk_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [
                    'name' => 'Блок 1',
                    'slug' => 'block-1',
                    'trk_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

            ]);

    }
}
