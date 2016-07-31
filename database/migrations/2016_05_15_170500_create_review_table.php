<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('videos_id')->unsigned();
//            $table->foreign('videos_id')->references('id')->on('videos');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('author');
            $table->string('tekst');
            $table->decimal('rating_1', 5, 2);
            $table->decimal('rating_2', 5, 2);
            $table->decimal('rating_3', 5, 2);
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
        Schema::drop('reviews');
    }
}
