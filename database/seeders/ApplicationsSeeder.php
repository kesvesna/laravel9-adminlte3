<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Factory;

class ApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        for ($i = 0; $i < 2; $i++) {
            DB::table('applications')->insert([
                'trk_id' => rand(1, 15),
                'notify_author' => rand(0,1),
                'comment' => $faker->realText('100'),
            ]);
        }

    }
}
