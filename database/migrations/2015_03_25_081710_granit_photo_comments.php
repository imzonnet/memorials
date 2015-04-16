<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class GranitPhotoComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('granit_photo_comments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('photo_id')->unsigned();
            $table->foreign('photo_id')->references('id')->on('granit_photo_items');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('text');
            $table->integer('likes')->default(0);
            $table->integer('parent_id')->default(0);
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
        Schema::drop('granit_photo_comments');
	}

}
