<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('equipment_names')->insert([
                [
                    'name' => 'ПВ-01-М',
                    'slug' => 'pv-01-m',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-1',
                    'slug' => 'hm-1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
