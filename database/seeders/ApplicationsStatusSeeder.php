<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class ApplicationsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_statuses')->insert([
            [
                'name' => 'Новая',
                'slug' => 'new',
                'background_color' => 'background: rgba(250, 7, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'В обработке',
                'slug' => 'in_progress',
                'background_color' => 'background: rgba(250, 232, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ремонт',
                'slug' => 'repair',
                'background_color' => 'background: rgba(250, 232, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Выполнена',
                'slug' => 'done',
                'background_color' => 'background: rgba(7, 250, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Выполняется',
                'slug' => 'in_work',
                'background_color' => 'background: rgba(250, 232, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Отклонена',
                'slug' => 'rejected',
                'background_color' => 'background: rgba(250, 7, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Удалена',
                'slug' => 'removed',
                'background_color' => 'background: rgba(250, 7, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Перенаправлена',
                'slug' => 'redirected',
                'background_color' => 'background: rgba(250, 7, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ответственный',
                'slug' => 'responsible',
                'background_color' => 'background: rgba(250, 7, 7, 0.1);',
                'sort_order' => 1,
                'visible' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
