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
                    'name' => 'Все',
                    'slug' => 'vse',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Парковка -2',
                    'slug' => 'parkovka-2',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Парковка -1',
                    'slug' => 'parkovka-1',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Парковка 0',
                    'slug' => 'parkovka-0',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Цоколь',
                    'slug' => 'tsokol',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '0 этаж',
                    'slug' => '0-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '1 этаж',
                    'slug' => '1-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '1а этаж',
                    'slug' => '1a-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '2 этаж',
                    'slug' => '2-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '3 этаж',
                    'slug' => '3-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '4 этаж',
                    'slug' => '4-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '5 этаж',
                    'slug' => '5-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '6 этаж',
                    'slug' => '6-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '7 этаж',
                    'slug' => '7-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '8 этаж',
                    'slug' => '8-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '9 этаж',
                    'slug' => '9-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '10 этаж',
                    'slug' => '10-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '11 этаж',
                    'slug' => '11-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '12 этаж',
                    'slug' => '12-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '13 этаж',
                    'slug' => '13-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '14 этаж',
                    'slug' => '14-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '15 этаж',
                    'slug' => '15-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '16 этаж',
                    'slug' => '16-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '17 этаж',
                    'slug' => '17-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '18 этаж',
                    'slug' => '18-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '19 этаж',
                    'slug' => '19-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '20 этаж',
                    'slug' => '20-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '21 этаж',
                    'slug' => '21-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Антресоль',
                    'slug' => 'antresol',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Кровля',
                    'slug' => 'krovlya',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Кровля +',
                    'slug' => 'krovlya+',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Кровля 7 этаж',
                    'slug' => 'krovlya-7-etazh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
