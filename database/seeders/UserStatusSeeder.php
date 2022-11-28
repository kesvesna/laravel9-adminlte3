<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_statuses')->insert([
            [
                'name' => 'Работает',
                'slug' => 'working',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'В отпуске',
                'slug' => 'on_holiday',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'На больничном',
                'slug' => 'on_sick',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Уволен',
                'slug' => 'fired',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Заблокирован',
                'slug' => 'blocked',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
