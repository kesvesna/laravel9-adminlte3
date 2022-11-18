<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class RepairsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 0; $i < 10; $i++) {
            DB::table('repairs')->insert([
                'trk_id' => rand(1, 15),
                'repair_status_id' => rand(1,5),
                'user_id' => rand(1,5),
                'service_id' => rand(1,5),
                'application_id' => rand(0,5),
                'comment' => $faker->realText('100'),
                'plan_date' => $faker->dateTime(),
            ]);
        }

    }
}
