<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('author');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name', 40);
            $table->string('video_key', 30);
            $table->string('thumbnails', 30);
            $table->string('video', 30);
            $table->string('beschrijving');
            $table->integer('prijs');
            $table->enum('level', ['beginner', 'intermediate', 'advanced', 'expert']);
            $table->enum('status', ['public', 'private', 'banned']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
