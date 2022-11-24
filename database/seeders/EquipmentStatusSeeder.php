<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment_statuses')->insert([
            [
                'name' => 'В эксплуатации',
                'slug' => 'in_operation',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'В ремонте',
                'slug' => 'in_repair',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Демонтировано',
                'slug' => 'disassembled',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Выведено из эксплуатации',
                'slug' => 'decommissioned',
                'sort_order' => 1,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
