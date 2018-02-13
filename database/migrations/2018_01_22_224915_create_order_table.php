<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->default(0);
            $table->string('proId')->default("");
            $table->string('first');
            $table->string('last');
            $table->string('description');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('phonenumber');
            $table->integer('active')->default(1);
            $table->decimal('balance')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
