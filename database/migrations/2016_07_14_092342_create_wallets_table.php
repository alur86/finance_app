<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {  
            $table->increments('id');
            $table->integer('profile_id')->references('id')->on('profiles');
            $table->integer('bank_id')->references('id')->on('banks'); 
            $table->integer('card_number');
            $table->string('card_name');
            $table->string('expire');
            $table->integer('cvv');
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
        Schema::drop('wallets');
    }
}
