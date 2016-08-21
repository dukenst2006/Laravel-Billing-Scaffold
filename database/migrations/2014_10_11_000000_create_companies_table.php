<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');      
            $table->string('address')->nullable();      
            $table->string('address2')->nullable();      
            $table->string('city')->nullable();      
            $table->string('state')->nullable();      
            $table->string('zip')->nullable();      
            $table->string('logo')->nullable();      
            $table->string('url')->nullable();      
            $table->string('main_phone')->nullable();
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
        Schema::drop('companies');
    }
}
