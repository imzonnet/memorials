<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class GranitMemorialRelationships extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('granit_memorial_relationships', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('relationship_state');
            $table->integer('relationship_type');
            $table->integer('mem_id')->unsigned();
            $table->foreign('mem_id')->references('id')->on('granit_memorials');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
		//
	}

}
