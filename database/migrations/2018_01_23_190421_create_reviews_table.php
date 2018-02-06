<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
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
            $table->integer('userId');  //the person being reviewed 
            $table->string('userFirst');
            $table->string('userLast');
            $table->integer('reviewerId'); //the person doing the reviewing
            $table->string('reviewerFirst');
            $table->string('reviewerLast');
            $table->integer('rating');
            $table->string('tagline');
            $table->string('description');
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
        Schema::dropIfExists('reviews');
    }
}
