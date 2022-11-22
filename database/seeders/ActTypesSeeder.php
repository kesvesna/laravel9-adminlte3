<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ActTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('act_types')->insert([
            [
                'name' => 'По плану',
                'slug' => 'by_plan',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'По заявке',
                'slug' => 'by_application',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

    }
}
