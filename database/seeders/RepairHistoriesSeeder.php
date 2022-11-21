<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepairHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('repair_histories')->insert([
            [
                'repair_id' => 1,
                'service_id' => 1,
                'repair_status_id' => 1,
                'user_id' => 1,
                'plan_date' => now(),
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'repair_id' => 2,
                'service_id' => 2,
                'repair_status_id' => 2,
                'user_id' => 2,
                'plan_date' => now(),
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
