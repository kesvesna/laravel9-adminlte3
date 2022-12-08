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
                [
                    'name' => 'ХМ-2',
                    'slug' => 'hm-2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-3',
                    'slug' => 'hm-3',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-4',
                    'slug' => 'hm-4',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-5',
                    'slug' => 'hm-5',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-6',
                    'slug' => 'hm-6',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-1.1',
                    'slug' => 'hm-1.1',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ХМ-1.2',
                    'slug' => 'hm-1.2',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПВ-02-М',
                    'slug' => 'pv-02-m',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПВ-03-М',
                    'slug' => 'pv-03-m',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПВ-04-М',
                    'slug' => 'pv-04-m',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПВ-05-М',
                    'slug' => 'pv-05-m',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'ПВ-06-М',
                    'slug' => 'pv-06-m',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-01-АС',
                    'slug' => 'p-01-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-02-АС',
                    'slug' => 'p-02-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-03-АС',
                    'slug' => 'p-03-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-04-АС',
                    'slug' => 'p-04-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-05-АС',
                    'slug' => 'p-05-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-06-АС',
                    'slug' => 'p-06-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-07-АС',
                    'slug' => 'p-07-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'П-08-АС',
                    'slug' => 'p-08-as',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]);

    }
}
