<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('work_types')->insert([
                [
                    'name' => 'Монтаж',
                    'slug' => 'montazh',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Демонтаж',
                    'slug' => 'demontazh',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Сборка',
                    'slug' => 'sborka',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Разборка',
                    'slug' => 'razborka',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ТО-3',
                    'slug' => 'to-3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ТО-4',
                    'slug' => 'to-4',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ТО-5',
                    'slug' => 'to-5',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ТО-6',
                    'slug' => 'to-6',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
