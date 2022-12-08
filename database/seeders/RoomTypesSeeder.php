<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('room_types')->insert([
                [
                    'name' => 'Коммерческое',
                    'slug' => 'commerce',
                    'sort_order' => 100,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Техническое',
                    'slug' => 'tech',
                    'sort_order' => 200,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Склад',
                    'slug' => 'sklad',
                    'sort_order' => 300,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Все',
                    'slug' => 'vse',
                    'sort_order' => 400,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
    }
}
