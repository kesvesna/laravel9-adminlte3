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
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'В обработке',
                'slug' => 'in_progress',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ремонт',
                'slug' => 'repair',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Выполнена',
                'slug' => 'done',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Отклонена',
                'slug' => 'rejected',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Удалена',
                'slug' => 'removed',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Перенаправлена',
                'slug' => 'redirected',
                'sort_order' => 1,
                'visible' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ответственный',
                'slug' => 'responsible',
                'sort_order' => 1,
                'visible' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
