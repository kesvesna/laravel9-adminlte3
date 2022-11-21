<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_histories')->insert([
            [
                'application_id' => 1,
                'service_id' => 1,
                'application_status_id' => 1,
                'user_id' => 1,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'application_id' => 2,
                'service_id' => 2,
                'application_status_id' => 2,
                'user_id' => 2,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

    }
}
