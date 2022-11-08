<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rooms')->insert([
            'name' => 'СП П1-24',
            'slug' => 'sp-p1-24',
            'sort_order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
