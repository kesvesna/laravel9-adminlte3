<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment_histories')->insert([
            [
                'equipment_id' => 1,
                'equipment_status_id' => 1,
                'created_by_user_id' => 1,
                'comment' => 'Тест',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'equipment_id' => 2,
                'equipment_status_id' => 1,
                'created_by_user_id' => 1,
                'comment' => 'Тест',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'equipment_id' => 3,
                'equipment_status_id' => 1,
                'created_by_user_id' => 1,
                'comment' => 'Тест',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
