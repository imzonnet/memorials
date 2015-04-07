<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class GranitPhotoItems extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('granit_photo_items', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('granit_photo_albums');
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
		Schema::drop('granit_photo_items');
	}

}
