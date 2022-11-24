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
            [
                'name' => 'Все',
                'slug' => 'vse',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'СП П1-24',
                'slug' => 'sp-p1-24',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 1',
                'slug' => 'vk-1',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 2',
                'slug' => 'vk-2',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 3',
                'slug' => 'vk-3',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 4',
                'slug' => 'vk-4',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

    }
}
