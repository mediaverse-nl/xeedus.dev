<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
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
            DB::table('comment')->insert([
                'video_id' => rand(1, 33),
                'user_id' => rand(1, 2),
                'parent_id' => rand(0, 5),
                'text' => $faker->text($maxNbChars = 200),
            ]);
        }
    }
}
