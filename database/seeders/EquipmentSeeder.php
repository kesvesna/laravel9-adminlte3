<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipments')->insert([
            [
                'system_type_id' => 2,
                'room_id' => 1,
                'equipment_name_id' => 16,
                'visible' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
