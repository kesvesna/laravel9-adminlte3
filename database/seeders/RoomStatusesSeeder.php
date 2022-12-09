<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('room_statuses')->insert([
                [
                    'name' => 'В эксплуатации',
                    'slug' => 'v-expluatacii',
                    'sort_order' => 100,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Ремонт',
                    'slug' => 'remont',
                    'sort_order' => 200,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Не занято',
                    'slug' => 'ne-zanuyto',
                    'sort_order' => 300,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Строится',
                    'slug' => 'stroitca',
                    'sort_order' => 500,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Демонтировано',
                    'slug' => 'demontirovano',
                    'sort_order' => 600,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);
    }
}
