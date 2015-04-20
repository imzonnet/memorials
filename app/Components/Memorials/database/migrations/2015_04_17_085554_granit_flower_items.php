<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class GranitFlowerItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('granit_flower_items', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('image');
            $table->integer('flower_id')->unsigned();
            $table->foreign('flower_id')->references('id')->on('granit_flowers')->onDelete('cascade');
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
		Schema::drop('granit_flower_items');
	}

}
