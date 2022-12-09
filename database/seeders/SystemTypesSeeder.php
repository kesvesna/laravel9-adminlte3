<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('system_types')->insert([
                [
                    'name' => 'Автоматика',
                    'slug' => 'avtomatika',
                    'sort_order' => 100,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Вентиляция',
                    'slug' => 'ventilyatsciya',
                    'sort_order' => 200,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Видеонаблюдение',
                    'slug' => 'videonabludenie',
                    'sort_order' => 300,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Воздушное отопление',
                    'slug' => 'vozdushnoe-otoplenie',
                    'sort_order' => 400,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Газовое оборудование',
                    'slug' => 'gazovoe-oborudovanie',
                    'sort_order' => 500,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Горячее водоснабжение',
                    'slug' => 'goriachee-vodosnabzhenie',
                    'sort_order' => 600,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Холодное водоснабжение',
                    'slug' => 'holodnoe-vodosnabzhenie',
                    'sort_order' => 700,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Ливневка',
                    'slug' => 'livnevka',
                    'sort_order' => 900,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Канализация',
                    'slug' => 'kanalizatsciya',
                    'sort_order' => 1000,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Лифты',
                    'slug' => 'lifti',
                    'sort_order' => 1100,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Эскалаторы',
                    'slug' => 'escalatori',
                    'sort_order' => 1200,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Траволаторы',
                    'slug' => 'travolatori',
                    'sort_order' => 1300,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Здание',
                    'slug' => 'zdanie',
                    'sort_order' => 1400,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Прилегающая территория',
                    'slug' => 'prilegaushcaya-territoriya',
                    'sort_order' => 1500,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Реклама',
                    'slug' => 'reklama',
                    'sort_order' => 1600,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Освещение',
                    'slug' => 'osveshenie',
                    'sort_order' => 1700,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Отделка',
                    'slug' => 'otdelka',
                    'sort_order' => 1800,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Отопление',
                    'slug' => 'otoplenie',
                    'sort_order' => 1900,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Сантехника',
                    'slug' => 'santehnika',
                    'sort_order' => 2000,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'СКУД',
                    'slug' => 'skud',
                    'sort_order' => 2100,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Кондиционирование',
                    'slug' => 'conditscionirovanie',
                    'sort_order' => 2200,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Холодоснабжение',
                    'slug' => 'holodosnabzhenie',
                    'sort_order' => 2300,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Электрооборудование',
                    'slug' => 'electrooborudovanie',
                    'sort_order' => 2400,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Электроснабжение',
                    'slug' => 'electrosnabzhenie',
                    'sort_order' => 2500,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
