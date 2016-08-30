<?php

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
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')
                  ->references('id')->on('companies');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('address')->nullable();      
            $table->string('address2')->nullable();      
            $table->string('city')->nullable();      
            $table->string('state')->nullable();      
            $table->string('zip')->nullable(); 
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('url')->nullable();
            $table->string('activate_token')->nullable();
            $table->rememberToken();
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
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
        Schema::drop('users');
    }
}
