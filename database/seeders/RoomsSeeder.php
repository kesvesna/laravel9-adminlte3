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
                'name' => 'ВК 1',
                'slug' => 'vk-1',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 2',
                'slug' => 'vk-2',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 3',
                'slug' => 'vk-3',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 4',
                'slug' => 'vk-4',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 5',
                'slug' => 'vk-5',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 6',
                'slug' => 'vk-6',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 7',
                'slug' => 'vk-7',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 8',
                'slug' => 'vk-8',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 9',
                'slug' => 'vk-9',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 10',
                'slug' => 'vk-10',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 11',
                'slug' => 'vk-11',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 12',
                'slug' => 'vk-12',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 13',
                'slug' => 'vk-13',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 14',
                'slug' => 'vk-14',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ВК 15',
                'slug' => 'vk-15',
                'room_type_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Въезд с Кантемировской',
                'slug' => 'vezd-s-kantemirovskoi',
                'room_type_id' => 6,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Въезд с Полюстровского',
                'slug' => 'vezd-s-polustrovskogo',
                'room_type_id' => 6,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'Выезд на Кантемировскую',
                'slug' => 'viezd-na-kantemirovskuu',
                'room_type_id' => 7,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Выезд на Полюстровский',
                'slug' => 'viezd-na-polustrovskii',
                'room_type_id' => 7,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
