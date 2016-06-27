<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++){
            DB::table('videos')->insert([
                'name' => $faker->name,
                'category_id' => rand(4, 10),
                'video_key' => str_random(10),
                'level' => rand(1, 3),
                'status' => 'on',
                'prijs' => rand(1, 40),
                'beschrijving' => $faker->text($maxNbChars = 200),
                'author_id' => rand(1, 2),
                'created_at' => $faker->date,
            ]);
        }
    }
}
