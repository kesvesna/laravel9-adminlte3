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
                    'name' => 'Входная группа',
                    'slug' => 'vhodnaya-gruppa',
                    'sort_order' => 500,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Въезд',
                    'slug' => 'vezd',
                    'sort_order' => 600,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Выезд',
                    'slug' => 'viezd',
                    'sort_order' => 700,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Для посетителей',
                    'slug' => ' dlya-posetitelii',
                    'sort_order' => 800,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

            ]);
    }
}
