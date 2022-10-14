<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class TownsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('towns')->insert([
                'name' => 'Москва',
                'slug' => 'moscow',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        DB::table('towns')->insert([
            'name' => 'Санкт-Петербург',
            'slug' => 'saint-petersburg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
