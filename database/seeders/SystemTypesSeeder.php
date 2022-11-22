<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('system_types')->insert([
                [
                    'name' => 'Вентиляция',
                    'slug' => 'ventilyatsciya',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Холодоснабжение',
                    'slug' => 'holodosnabzhenie',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
