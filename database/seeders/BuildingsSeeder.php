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
                    'name' => 'Все',
                    'slug' => 'vse',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Блок 1',
                    'slug' => 'block-1',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Блок 2',
                    'slug' => 'block-2',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Блок 3',
                    'slug' => 'block-3',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПН1 (Корпус 1)',
                    'slug' => 'pn1-corpus1',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПН1 (Корпус 2)',
                    'slug' => 'pn1-corpus2',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПН2',
                    'slug' => 'pn2',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Барселона',
                    'slug' => 'barselona',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Лондон',
                    'slug' => 'london',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Париж',
                    'slug' => 'parizh',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Рим',
                    'slug' => 'rim',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона A',
                    'slug' => 'zona-a',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона B',
                    'slug' => 'zona-b',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона C',
                    'slug' => 'zona-c',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона D',
                    'slug' => 'zona-d',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона E',
                    'slug' => 'zona-e',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона F',
                    'slug' => 'zona-f',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона G',
                    'slug' => 'zona-g',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Зона H',
                    'slug' => 'zona-h',
                    'sort_order' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
