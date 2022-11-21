<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationRepairActSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_repair_act')->insert([
            [
                'application_id' => 1,
                'repair_id' => 2,
                'act_id' => null,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'application_id' => null,
                'repair_id' => null,
                'act_id' => null,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
