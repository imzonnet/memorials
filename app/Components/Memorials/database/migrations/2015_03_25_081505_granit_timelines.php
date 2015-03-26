<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class GranitTimelines extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('granit_timelines', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('mem_id')->unsigned();
            $table->foreign('mem_id')->references('id')->on('granit_memorials');
            $table->string('title');
            $table->integer('year');
            $table->text('description');
            $table->string('image');
            $table->integer('state')->default(1);
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::drop('granit_timelines');
	}

}
