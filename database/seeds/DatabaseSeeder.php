<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('VideoTableSeeder');
        $this->call('CommentTableSeeder');

        DB::table('users')->insert([
            ['name' => 'bert', 'voornaam' => 'bert', 'email' => 'bleh@gmail.com', 'password' => bcrypt('admin'), 'role' => 'admin', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'admin', 'voornaam' => 'deveron', 'email' => 'admin@mail.com', 'password' => bcrypt('admin'), 'role' => 'admin', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name' => 'willy', 'voornaam' => 'willy', 'email' => 'user@mail.com', 'password' => bcrypt('admin'), 'role' => 'user', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);

        DB::table('chatmessage')->insert([
            ['user_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ]);

        DB::table('categories')->insert([
            ['cate_id' => '0', 'name' => 'main 1 dieren', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '0', 'name' => 'main 2 sport', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '0', 'name' => 'main 3 gaming', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '1', 'name' => 'sub 1 training', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '1', 'name' => 'sub 2 verzorgen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '2', 'name' => 'sub 1 golf', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '2', 'name' => 'sub 2 voetbal', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '3', 'name' => 'sub 1 pc', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '3', 'name' => 'sub 2 console', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['cate_id' => '3', 'name' => 'sub 3 retro', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);

//        DB::table('videos')->insert([
//            ['name' => 'katten video', 'category_id' => 4, 'video_key' => str_random(10), 'level' => rand(1, 3), 'status' => 'on', 'prijs' => rand(1, 40), 'beschrijving' => $description, 'author_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
//            ['name' => 'honden video', 'category_id' => 4, 'video_key' => str_random(10), 'level' => rand(1, 3), 'status' => 'on', 'prijs' => rand(1, 40), 'beschrijving' => $description, 'author_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
//            ['name' => 'golf video', 'category_id' => 9, 'video_key' => str_random(10), 'level' => rand(1, 3), 'status' => 'on', 'prijs' => rand(1, 40), 'beschrijving' => $description, 'author_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
//            ['name' => 'voetbal video', 'category_id' => 7, 'video_key' => str_random(10), 'level' => rand(1, 3), 'status' => 'on', 'prijs' => rand(1, 40), 'beschrijving' => $description, 'author_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
//            ['name' => 'battlefield video', 'category_id' => 8, 'video_key' => str_random(10), 'level' => rand(1, 3), 'status' => 'on',  'prijs' => rand(1, 40), 'beschrijving' => $description, 'author_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
//            ['name' => 'GTA video', 'category_id' => 8, 'video_key' => str_random(10), 'level' => rand(1, 3), 'prijs' => rand(1, 40), 'status' => 'on', 'beschrijving' => $description, 'author_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
//            ['name' => 'the sims video', 'category_id' => 8, 'video_key' => str_random(10), 'level' => rand(1, 3), 'prijs' => rand(1, 40), 'status' => 'on', 'beschrijving' => $description, 'author_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
//        ]);

        DB::table('order')->insert([
            ['user_id' => 1, 'video_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 1, 'video_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 1, 'video_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 2, 'video_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 2, 'video_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);

        DB::table('reviews')->insert([
            ['user_id' => 1, 'author_id' => 1, 'rating_1' => rand(1, 5), 'rating_2' => rand(1, 5), 'rating_3' => rand(1, 5), 'tekst' => 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 1, 'author_id' => 2, 'rating_1' => rand(1, 5), 'rating_2' => rand(1, 5), 'rating_3' => rand(1, 5), 'tekst' => 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 1, 'author_id' => 3, 'rating_1' => rand(1, 5), 'rating_2' => rand(1, 5), 'rating_3' => rand(1, 5), 'tekst' => 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);

        DB::table('author')->insert([
            ['user_id' => 1, 'biography' => 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['user_id' => 2, 'biography' => 'Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
