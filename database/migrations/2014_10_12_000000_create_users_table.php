<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('rating', 5, 2)->default(0); //user's rating
            $table->integer('numOfRating')->default(0); //number of user's ratings
            $table->integer('role')->default(0);   //0 Base user, 1 Pro user, 2 Admin
            $table->string('first');
            $table->string('last');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('phonenumber');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //pro stuff
            $table->string('licenseNum')->default(0);
            $table->string('insuranceNum')->default(0);
            $table->string('liabilityNum')->default(0);

            //Cashier stuff
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();

        Schema::create('subscriptions', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('stripe_id');
            $table->string('stripe_plan');
            $table->integer('quantity');
            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('subscriptions');
    }
}
