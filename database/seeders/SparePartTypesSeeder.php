<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SparePartTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('spare_part_types')->insert([
                [
                    'name' => 'Подшипник',
                    'slug' => 'podshipnik',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Фильтр карман приток',
                    'slug' => 'filtr_karmanniy_pritok',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Фильтр карман вытяжка',
                    'slug' => 'filtr_karmanniy_vityazhka',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Фильтр панель приток',
                    'slug' => 'filtr_panelniy_pritok',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Фильтр панель вытяжка',
                    'slug' => 'filtr_panelniy_vitayzhka',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Фильтр кассета приток',
                    'slug' => 'filtr_cassetniy_pritok',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Фильтр кассета вытяжка',
                    'slug' => 'filtr_cassetniy_vitayzhka',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Ремень',
                    'slug' => 'remen',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Автомат',
                    'slug' => 'avtomat',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
